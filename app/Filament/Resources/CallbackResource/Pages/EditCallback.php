<?php

declare(strict_types=1);

namespace App\Filament\Resources\CallbackResource\Pages;

use App\Filament\Resources\CallbackResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

final class EditCallback extends EditRecord
{
    protected static string $resource = CallbackResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
