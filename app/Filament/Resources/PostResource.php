<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use BackedEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

final class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rss';

    protected static ?string $modelLabel = 'новость';

    protected static ?string $pluralModelLabel = 'Новости';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                        if (! $get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->label('Заголовок')
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
                SpatieMediaLibraryFileUpload::make('news')
                    ->image()
                    ->collection('news')
                    ->label('Изображение'),
                DateTimePicker::make('published_at')
                    ->label('Дата публикации'),
                Textarea::make('excerpt')
                    ->label('Отрывок')
                    ->maxLength(150)
                    ->required(),
                RichEditor::make('content')
                    ->label('Контент')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('news')
                    ->label('Изображение')
                    ->collection('news'),
                TextColumn::make('title')
                    ->label('Заголовок')
                    ->limit(40),
                TextColumn::make('published_at')
                    ->label('Дата публикации')
                    ->dateTime()
                    ->sortable(),
            ])->defaultSort('published_at', 'desc')
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
