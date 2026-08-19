<?php

declare(strict_types=1);

namespace App\Filament\Pages;

use App\Models\Home;
use BackedEnum;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
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
final class PageHome extends Page implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $hero_image;

    public $banner1_title;

    public $banner2_title;

    public $banner1_description;

    public $banner2_description;

    public $slider1_title;

    public $slider2_title;

    public $features;

    public $seo_title;

    public $seo_description;

    public $ogImage;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Главная';

    protected static ?string $title = 'Главная страница';

    protected static string|UnitEnum|null $navigationGroup = 'Страницы';

    protected static ?string $slug = 'page-home';

    protected static ?int $navigationSort = 1;

    protected string $view = 'filament.pages.page-home';

    public function mount(): void
    {
        $homePage = Home::first();

        if ($homePage) {
            $this->form->fill([
                'hero_image' => $this->hero_image,
                'banner1_title' => $homePage->banner1_title,
                'banner2_title' => $homePage->banner2_title,
                'banner1_description' => $homePage->banner1_description,
                'banner2_description' => $homePage->banner2_description,
                'slider1_title' => $homePage->slider1_title,
                'slider2_title' => $homePage->slider2_title,
                'seo_title' => $homePage->seo_title,
                'seo_description' => $homePage->seo_description,
                'features' => $homePage->features,
            ]);
        } else {
            Home::create([
                'slider1_title' => 'Номера класса стандарт',
                'slider2_title' => 'Номера класса Полу-люкс и люкс',
                'features' => [],
            ]);
        }

    }

    public function create(): void
    {
        $homePage = Home::first();
        $homePage->update($this->form->getState());
        $this->form->model($homePage)->saveRelationships();
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
                    SpatieMediaLibraryFileUpload::make('hero_image')
                        ->image()
                        ->collection('hero_image')
                        ->label('Изображение на первом экране'),
                    TextInput::make('banner1_title')
                        ->label('Заголовок на первом баннере')
                        ->maxLength(255),
                    TextInput::make('banner1_description')
                        ->label('Текст на первом баннере')
                        ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('banner1')
                        ->image()
                        ->collection('banner')
                        ->label('Изображение на первом баннере'),
                    TextInput::make('banner2_title')
                        ->label('Заголовок на втором баннере')
                        ->maxLength(255),
                    TextInput::make('banner2_description')
                        ->label('Текст на втором баннере')
                        ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('banner2')
                        ->image()
                        ->collection('banner1')
                        ->label('Изображение на втором баннере'),
                    TextInput::make('slider1_title')
                        ->required()
                        ->label('Заголовок первого слайдера')
                        ->maxLength(255),
                    TextInput::make('slider2_title')
                        ->required()
                        ->label('Заголовок второго слайдера')
                        ->maxLength(255),
                    Repeater::make('features')
                        ->label('Особенности')
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->label('Заголовок'),
                            Textarea::make('description')
                                ->required()
                                ->label('Описание'),
                            FileUpload::make('icon')
                                ->required()
                                ->label('Иконка'),
                        ])
                        ->columnSpan('full')
                        ->createItemButtonLabel('Добавить пункт')
                        ->collapsed()
                        ->grid(),
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
                            ->label('SEO изображение'),
                    ])
                    ->columnSpan(1),
            ])->columns(3),
        ];
    }

    protected function getFormModel(): Home
    {
        return Home::first();
    }
}
