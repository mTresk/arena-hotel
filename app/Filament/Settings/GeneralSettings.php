<?php

namespace App\Filament\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    public string $address;
    public string $address_full;
    public string $phone;
    public string $whatsapp;
    public string $telegram;
    public string $viber;
    public string $email;
    public string $schedule;
    public array $requisites;

    public static function group(): string
    {
        return 'general';
    }
}
