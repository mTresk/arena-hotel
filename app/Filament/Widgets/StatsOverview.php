<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Callback;
use App\Models\Comment;
use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Отзывов', Comment::count()),
            Stat::make('Контактов', Contact::count()),
            Stat::make('Обратных звонков', Callback::count()),
        ];
    }
}
