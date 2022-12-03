<?php

namespace App\Filament\Pages;

use App\Models\Home;
use App\Models\Policy;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;
use Str;

class PagePolicy extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Политика конфиденциальности';
    protected static ?string $title = 'Политика конфиденциальности';
    protected static ?string $navigationGroup = 'Страницы';
    protected static ?string $slug = 'page-policy';
    protected static ?int $navigationSort = 3;

    protected static string $view = 'filament.pages.page-policy';

    use Forms\Concerns\InteractsWithForms;

    public $content;

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

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                RichEditor::make('content')
                    ->label('Содержимое')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ])
        ];
    }

    protected function getFormModel(): Policy
    {
        return Policy::first();
    }

    public function create(): void
    {
        $policyPage = Policy::first();
        $policyPage->update($this->form->getState());
        $this->form->model($policyPage)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
