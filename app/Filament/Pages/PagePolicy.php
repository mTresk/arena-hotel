<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\Policy;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use UnitEnum;

/**
 * @property-read Schema $form
 */
final class PagePolicy extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $content;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Политика конфиденциальности';

    protected static ?string $title = 'Политика конфиденциальности';

    protected static string|UnitEnum|null $navigationGroup = 'Страницы';

    protected static ?string $slug = 'page-policy';

    protected static ?int $navigationSort = 3;

    protected string $view = 'filament.pages.page-policy';

    public function mount(): void
    {
        $policyPage = Policy::first();

        if ($policyPage) {
            $this->form->fill([
                'content' => $policyPage->content,
            ]);
        } else {
            Policy::create([
                'content' => '',
            ]);
        }
    }

    public function create(): void
    {
        $policyPage = Policy::first();
        $policyPage->update($this->form->getState());
        $this->form->model($policyPage)->saveRelationships();
        Notification::make()
            ->title('Сохранено')
            ->success()
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make([
                RichEditor::make('content')
                    ->label('Содержимое')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ]),
        ];
    }

    protected function getFormModel(): Policy
    {
        return Policy::first();
    }
}
