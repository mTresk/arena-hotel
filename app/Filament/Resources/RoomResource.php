<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';
    protected static ?string $modelLabel = 'номера';
    protected static ?string $pluralModelLabel = 'Номера';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Основное')->schema([
                    TextInput::make('name')
                        ->label('Название номера')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('description')
                        ->label('Описание номера')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('price')
                        ->label('Цена')
                        ->required()
                        ->maxLength(255),
                    Select::make('category_id')
                        ->label('Категория')
                        ->relationship('category', 'name')
                        ->required(),

                    Repeater::make('facilities')
                        ->label('Удобства и возможности')
                        ->schema([
                            TextInput::make('facilities')
                                ->label('Удобство')
                                ->required()
                        ])
                        ->orderable()
                        ->collapsed()
                        ->createItemButtonLabel('Добавить удобство')
                        ->columns(1),
                    SpatieMediaLibraryFileUpload::make('thumb')
                        ->image()
                        ->collection('thumbs')
                        ->multiple()
                        ->enableReordering()
                        ->label('Изображения в карточке')
                        ->panelLayout('grid'),
                    SpatieMediaLibraryFileUpload::make('header')
                        ->image()
                        ->collection('headers')
                        ->label('Изображение в шапке'),
                    SpatieMediaLibraryFileUpload::make('slide')
                        ->image()
                        ->collection('sliders')
                        ->multiple()
                        ->enableReordering()
                        ->label('Изображения в слайдере')
                        ->panelLayout('grid')
                ])->columnSpan(2),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('seo_title')
                            ->label('SEO заголовок')
                            ->maxLength(255),
                        Textarea::make('seo_description')
                            ->label('SEO описание')
                            ->maxLength(255),
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
                TextColumn::make('name')
                    ->label('Название номера'),
                TextColumn::make('category.name')
                    ->label('Категория номера')
                    ->sortable(),
                TextColumn::make('price')
                    ->sortable()
                    ->label('Цена'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])->defaultSort('category.name');
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
