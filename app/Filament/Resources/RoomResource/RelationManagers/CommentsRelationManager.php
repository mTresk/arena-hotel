<?php

declare(strict_types=1);

namespace App\Filament\Resources\RoomResource\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

final class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'username';

    protected static ?string $modelLabel = 'отзыв';

    protected static ?string $pluralModelLabel = 'Отзывы';

    public function form(Schema $schema): Schema
    {
        return $schema
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

    public function table(Table $table): Table
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
                CreateAction::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }
}
