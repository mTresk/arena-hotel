<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use App\Models\Room;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use UnitEnum;

final class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-oval-left-ellipsis';

    protected static ?string $modelLabel = 'отзыв';

    protected static ?string $pluralModelLabel = 'Отзывы';

    protected static string|UnitEnum|null $navigationGroup = 'Обратная связь';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('username')
                    ->label('Имя')
                    ->required()
                    ->maxLength(255),
                Select::make('room_id')
                    ->required()
                    ->options(fn (): array => Room::query()->pluck('name', 'id')->all())
                    ->label('Номер'),
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
                DatePicker::make('created_at')
                    ->label('Дата публикации'),
                Toggle::make('is_published')
                    ->label('Опубликован'),
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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
