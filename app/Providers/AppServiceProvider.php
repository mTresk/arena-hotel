<?php

namespace App\Providers;

use App\Filament\Settings\GeneralSettings;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;

class AppServiceProvider extends ServiceProvider
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
            $view->with('whatsapp', $settings->whatsapp);
            $view->with('telegram', $settings->telegram);
            $view->with('viber', $settings->viber);
            $view->with('email', $settings->email);
            $view->with('schedule', $settings->schedule);
            $view->with('requisites', $settings->requisites);
        });

        Filament::serving(function () {
            Filament::registerViteTheme('resources/scss/filament.scss');
            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->url(MyProfile::getUrl()),
            ]);
        });
    }
}
