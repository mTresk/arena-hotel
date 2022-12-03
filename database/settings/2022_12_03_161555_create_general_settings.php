<?php

use Spatie\LaravelSettings\Exceptions\SettingAlreadyExists;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    /**
     * @throws SettingAlreadyExists
     */
    public function up(): void
    {
        $this->migrator->add('general.site_name', '');
        $this->migrator->add('general.address', '');
        $this->migrator->add('general.address_full', '');
        $this->migrator->add('general.phone', '');
        $this->migrator->add('general.whatsapp', '');
        $this->migrator->add('general.telegram', '');
        $this->migrator->add('general.viber', '');
        $this->migrator->add('general.email', '');
        $this->migrator->add('general.schedule', '');
        $this->migrator->add('general.requisites', []);
    }
}
