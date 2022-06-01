<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class UpdateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.auth_enabled', True);
    }
}
