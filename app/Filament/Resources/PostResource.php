<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Closure;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rss';
    protected static ?string $modelLabel = 'новость';
    protected static ?string $pluralModelLabel = 'Новости';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->afterStateUpdated(function (Closure $get, Closure $set, ?string $state) {
                        if (!$get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->label('Заголовок')
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
