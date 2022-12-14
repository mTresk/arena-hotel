<?php

namespace App\Filament\Pages;


use App\Filament\Settings\GeneralSettings;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class PageSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;
    protected static ?string $title = 'Настройки';
    protected static ?string $navigationLabel = 'Общие настройки';
    protected static ?string $slug = 'settings';
    protected static ?int $navigationSort = 10;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Основные настройки')
                ->schema([
                    TextInput::make('site_name')
                        ->required()
                        ->label('Название сайта'),
                    TextInput::make('address')
                        ->required()
                        ->label('Адрес'),
                    TextInput::make('address_full')
                        ->required()
                        ->label('Полный адрес'),
                    TextInput::make('phone')
                        ->required()
                        ->label('Телефон'),
                    TextInput::make('phone_mobile')
                        ->required()
                        ->label('Мобильный телефон'),
                    TextInput::make('phone_local')
                        ->required()
                        ->label('Городской телефон'),
                    TextInput::make('email')
                        ->required()
                        ->email()
                        ->label('Почта'),
                    TextInput::make('schedule')
                        ->required()
                        ->label('Время работы'),
                    Repeater::make('requisites')
                        ->label('Реквизиты')
                        ->schema([
                            TextInput::make('item')->required()
                                ->label('Пункт'),
                        ])
                        ->columnSpan('full')
                        ->createItemButtonLabel('Добавить пункт')
                        ->grid()
                        ->collapsed(),
                ])->columns(2),
            Section::make('Мессенджеры')
                ->schema([
                    TextInput::make('telegram')
                        ->required()
                        ->label('Telegram'),
                    TextInput::make('viber')
                        ->required()
                        ->label('Viber'),
                    TextInput::make('whatsapp')
                        ->required()
                        ->label('WhatsApp'),
                ])->columns(2),
        ];
    }
}
