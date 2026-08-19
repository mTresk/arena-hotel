<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackResource\Pages;
use App\Models\Callback;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

final class CallbackResource extends Resource
{
    protected static ?string $model = Callback::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-phone-arrow-down-left';

    protected static ?string $modelLabel = 'Обратный звонок';

    protected static ?string $navigationLabel = 'Обратный звонок';

    protected static ?string $pluralModelLabel = 'Обратные звонки';

    protected static string|UnitEnum|null $navigationGroup = 'Обратная связь';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label('Пользователь')
                    ->required()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->label('Телефон')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Пользователь'),
                TextColumn::make('phone')
                    ->label('Телефон'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Дата и время заявки'),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListCallbacks::route('/'),
            'create' => Pages\CreateCallback::route('/create'),
            'edit' => Pages\EditCallback::route('/{record}/edit'),
        ];
    }
}
