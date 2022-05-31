<?php

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    
    public bool $site_active;

    public string $contact_email;

    public bool $auth_enabled;
    
    public static function group(): string
    {
        return 'general';
    }
}