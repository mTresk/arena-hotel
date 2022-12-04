<?php

namespace App\Filament\Resources\RoomResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'username';
    protected static ?string $modelLabel = 'отзыв';
    protected static ?string $pluralModelLabel = 'Отзывы';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('username')
                    ->label('Имя')
                    ->required()
                    ->maxLength(255),
                Group::make()
                    ->relationship('room')
                    ->schema([
                        TextInput::make('name')
                            ->label('Название номера')
                            ->disabled(),
                    ]),
                Textarea::make('review')
                    ->label('Отзыв')
                    ->required()
                    ->maxLength(65535),
                Group::make()
                    ->relationship('rating')
                    ->schema([
                        TextInput::make('rating')
                            ->label('Оценка')
                            ->required()
                            ->numeric(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->label('Имя'),
                TextColumn::make('review')
                    ->label('Отзыв')
                    ->limit(20),
                TextColumn::make('rating.rating')
                    ->label('Оценка'),
                ToggleColumn::make('is_published')
                    ->label('Опубликован')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
