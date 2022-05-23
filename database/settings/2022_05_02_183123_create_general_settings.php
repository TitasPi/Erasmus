<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Photo app');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.contact_email', 'example@pixylt.com');
    }
}
