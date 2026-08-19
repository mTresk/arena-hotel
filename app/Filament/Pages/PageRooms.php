<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\RoomsPage;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Str;
use UnitEnum;

/**
 * @property-read Schema $form
 */
final class PageRooms extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $page_title;

    public $header;

    public $seo_title;

    public $seo_description;

    public $ogImage;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Номера';

    protected static string|UnitEnum|null $navigationGroup = 'Страницы';

    protected static ?string $title = 'Страница номеров';

    protected static ?string $slug = 'page-rooms';

    protected static ?int $navigationSort = 2;

    protected string $view = 'filament.pages.page-rooms';

    public function mount(): void
    {
        $roomsPage = RoomsPage::first();

        if ($roomsPage) {
            $this->form->fill([
                'page_title' => $roomsPage->page_title,
                'seo_title' => $roomsPage->seo_title,
                'seo_description' => $roomsPage->seo_description,
                'header' => $this->header,
            ]);
        } else {
            RoomsPage::create([
                'page_title' => 'Заголовок страницы',
            ]);
        }

    }

    public function create(): void
    {
        $roomsPage = RoomsPage::first();
        $roomsPage->update($this->form->getState());
        $this->form->model($roomsPage)->saveRelationships();
        Notification::make()
            ->title('Сохранено')
            ->success()
            ->send();
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make([
                Section::make('Основное')->schema([
                    TextInput::make('page_title')
                        ->label('Название страницы')
                        ->required()
                        ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('header')
                        ->image()
                        ->collection('headers')
                        ->label('Изображение в шапке'),
                ])->columnSpan(2),
                Section::make('SEO')
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('SEO заголовок')
                            ->maxLength(60)
                            ->helperText(fn (?string $state): string => (string) Str::of((string) mb_strlen($state ?? ''))
                                ->append(' / ')
                                ->append(60 .' ')
                                ->append((string) Str::of('символов')->lower()))
                            ->reactive(),
                        Textarea::make('seo_description')
                            ->label('SEO описание')
                            ->maxLength(160)
                            ->helperText(fn (?string $state): string => (string) Str::of((string) mb_strlen($state ?? ''))
                                ->append(' / ')
                                ->append(160 .' ')
                                ->append((string) Str::of('символов')->lower()))
                            ->reactive(),
                        SpatieMediaLibraryFileUpload::make('ogImage')
                            ->image()
                            ->collection('seo')
                            ->label('SEO изображение'), ])
                    ->columnSpan(1),
            ])->columns(3),
        ];
    }

    protected function getFormModel(): RoomsPage
    {
        return RoomsPage::first();
    }
}
