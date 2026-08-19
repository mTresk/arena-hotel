<?php

declare(strict_types=1);

namespace App\Providers;

use App\Filament\Settings\GeneralSettings;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            $settings = app(GeneralSettings::class);

            $view->with('site_name', $settings->site_name);
            $view->with('address', $settings->address);
            $view->with('address_full', $settings->address_full);
            $view->with('phone', $settings->phone);
            $view->with('phone_mobile', $settings->phone_mobile);
            $view->with('phone_local', $settings->phone_local);
            $view->with('whatsapp', $settings->whatsapp);
            $view->with('telegram', $settings->telegram);
            $view->with('viber', $settings->viber);
            $view->with('email', $settings->email);
            $view->with('schedule', $settings->schedule);
            $view->with('requisites', $settings->requisites);
        });
    }
}
