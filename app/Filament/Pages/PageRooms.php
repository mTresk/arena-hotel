<?php

namespace App\Filament\Pages;

use App\Models\RoomsPage;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;
use Str;

class PageRooms extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Номера';
    protected static ?string $navigationGroup = 'Страницы';

    protected static string $view = 'filament.pages.page-rooms';

    use Forms\Concerns\InteractsWithForms;

    public $page_title;
    public $header;
    public $seo_title;
    public $seo_description;
    public $ogImage;

    public function mount(): void
    {
        $roomsPage = RoomsPage::first();

        if ($roomsPage) {
            $this->form->fill([
                'page_title' => $roomsPage->page_title,
                'seo_title' => $roomsPage->seo_title,
                'seo_description' => $roomsPage->seo_description,
                'header' => $this->header
            ]);
        } else {
            RoomsPage::create([
                'page_title' => 'Заголовок страницы'
            ]);
        }


    }

    protected function getFormSchema(): array
    {
        return [
            Card::make([
                Section::make('Основное')->schema([
                    TextInput::make('page_title')
                        ->label('Название страницы')
                        ->required()
                        ->maxLength(255)
                        ->default('Status Update'),
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
                            ->helperText(function (?string $state): string {
                                return (string)Str::of(strlen($state))
                                    ->append(' / ')
                                    ->append(60 . ' ')
                                    ->append(Str::of('символов')->lower());
                            })
                            ->reactive(),
                        Textarea::make('seo_description')
                            ->label('SEO описание')
                            ->maxLength(160)
                            ->helperText(function (?string $state): string {
                                return (string)Str::of(strlen($state))
                                    ->append(' / ')
                                    ->append(160 . ' ')
                                    ->append(Str::of('символов')->lower());
                            })
                            ->reactive(),
                        SpatieMediaLibraryFileUpload::make('ogImage')
                            ->image()
                            ->collection('seo')
                            ->label('SEO изображение'),])
                    ->columnSpan(1),
            ])->columns(3)
        ];
    }

    protected function getFormModel(): RoomsPage
    {
        return RoomsPage::first();
    }

    public function create(): void
    {
        $roomsPage = RoomsPage::first();
        $roomsPage->update($this->form->getState());
        $this->form->model($roomsPage)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
