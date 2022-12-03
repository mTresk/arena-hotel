<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Closure;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-emoji-happy';
    protected static ?string $modelLabel = 'услуги';
    protected static ?string $pluralModelLabel = 'Услуги';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основное')->schema([
                    SpatieMediaLibraryFileUpload::make('header')
                        ->image()
                        ->collection('headers')
                        ->label('Изображение в шапке'),
                    TextInput::make('title')
                        ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                            if (!$get('is_slug_changed_manually') && filled($state)) {
                                $set('slug', Str::slug($state));
                            }
                        })
                        ->label('Название страницы')
                        ->reactive()
                        ->required(),
                    TextInput::make('slug')
                        ->afterStateUpdated(function (Closure $set) {
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
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
