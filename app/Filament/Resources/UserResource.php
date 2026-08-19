<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

final class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = 'пользователя';

    protected static ?string $pluralModelLabel = 'Пользователи';

    protected static ?int $navigationSort = 11;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()->schema([
                    FileUpload::make('avatar')
                        ->avatar()
                        ->label('Аватар'),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->label('Имя'),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->label('Email'),
                    DatePicker::make('email_verified_at')
                        ->label('Email подтвержден'),
                    TextInput::make('password')
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(static fn (?string $state): ?string => filled($state) ? Hash::make($state) : null)
                        ->required(static fn (Page $livewire) => $livewire instanceof Pages\CreateUser)
                        ->dehydrated(static fn (?string $state): bool => filled($state))
                        ->label(static fn (Page $livewire) => ($livewire instanceof Pages\EditUser) ? 'Новый пароль' : 'Пароль'),
                    Toggle::make('is_admin')
                        ->required()
                        ->label('Администратор'),
                    Toggle::make('is_editor')
                        ->required()
                        ->label('Редактор'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->label('Аватар')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')->label('Имя'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\BooleanColumn::make('is_admin')->label('Администратор'),
                Tables\Columns\BooleanColumn::make('is_editor')->label('Редактор'),
                Tables\Columns\BooleanColumn::make('email_verified_at')->label('Подтвержден'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }
}
