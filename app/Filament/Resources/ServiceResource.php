<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

final class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-face-smile';

    protected static ?string $modelLabel = 'услуги';

    protected static ?string $pluralModelLabel = 'Услуги';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Основное')->schema([
                    SpatieMediaLibraryFileUpload::make('header')
                        ->image()
                        ->collection('headers')
                        ->label('Изображение в шапке'),
                    TextInput::make('title')
                        ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                            if (! $get('is_slug_changed_manually') && filled($state)) {
                                $set('slug', Str::slug($state));
                            }
                        })
                        ->label('Название страницы')
                        ->reactive()
                        ->required(),
                    TextInput::make('slug')
                        ->afterStateUpdated(function (Set $set) {
                            $set('is_slug_changed_manually', true);
                        })
                        ->label('Ссылка')
                        ->required(),
                    Hidden::make('is_slug_changed_manually')
                        ->default(false)
                        ->dehydrated(false),
                    RichEditor::make('content')
                        ->label('Контент')
                        ->required()
                        ->maxLength(65535),
                    SpatieMediaLibraryFileUpload::make('thumb')
                        ->image()
                        ->collection('thumbs')
                        ->multiple()
                        ->enableReordering()
                        ->label('Изображения в карточке')
                        ->panelLayout('grid'),
                    TextInput::make('banner_title')
                        ->label('Заголовок на баннере')
                        ->maxLength(255),
                    TextInput::make('banner_description')
                        ->label('Текст на баннере')
                        ->maxLength(255),
                    SpatieMediaLibraryFileUpload::make('banner')
                        ->image()
                        ->collection('banners')
                        ->label('Изображение на баннере'),
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
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('thumb')
                    ->collection('thumbs')
                    ->label('Изображение'),
                Tables\Columns\TextColumn::make('title')
                    ->label('Услуга'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
