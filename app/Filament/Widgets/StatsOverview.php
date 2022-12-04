<?php

namespace App\Filament\Widgets;

use App\Models\Callback;
use App\Models\Comment;
use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $commentCount = Comment::count();
        $contactCount = Contact::count();
        $callbackCount = Callback::count();
        return [
            Card::make('Отзывов', $commentCount),
            Card::make('Контактов', $contactCount),
            Card::make('Обратных звонков', $callbackCount),
        ];
    }
}
