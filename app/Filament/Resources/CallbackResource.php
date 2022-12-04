<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CallbackResource\Pages;
use App\Filament\Resources\CallbackResource\RelationManagers;
use App\Models\Callback;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CallbackResource extends Resource
{
    protected static ?string $model = Callback::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone-incoming';
    protected static ?string $modelLabel = 'Обратный звонок';
    protected static ?string $navigationLabel = 'Обратный звонок';
    protected static ?string $pluralModelLabel = 'Обратные звонки';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
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
            'index' => Pages\ListCallbacks::route('/'),
            'create' => Pages\CreateCallback::route('/create'),
            'edit' => Pages\EditCallback::route('/{record}/edit'),
        ];
    }
}
