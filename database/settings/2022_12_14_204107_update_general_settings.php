<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Exceptions\SettingAlreadyExists;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

final class UpdateGeneralSettings extends SettingsMigration
{
    /**
     * @throws SettingAlreadyExists
     */
    public function up(): void
    {
        $this->migrator->add('general.phone_mobile', '');
        $this->migrator->add('general.phone_local', '');
    }
}
