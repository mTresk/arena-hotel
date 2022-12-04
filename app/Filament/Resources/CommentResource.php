<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat';
    protected static ?string $modelLabel = 'отзыв';
    protected static ?string $pluralModelLabel = 'Отзывы';
    protected static ?string $navigationGroup = 'Обратная связь';
    protected static ?int $navigationSort = 4;

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
                Toggle::make('is_published')
                    ->label('Опубликован')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')
                    ->label('Постоялец'),
                TextColumn::make('review')
                    ->label('Отзыв')
                    ->limit(20),
                TextColumn::make('rating.rating')
                    ->label('Оценка'),
                TextColumn::make('room.name')
                    ->label('Номер'),
                TextColumn::make('created_at')->dateTime()
                    ->label('Дата')
                    ->sortable(),
                ToggleColumn::make('is_published')
                    ->label('Опубликован')
                    ->sortable(),
            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
