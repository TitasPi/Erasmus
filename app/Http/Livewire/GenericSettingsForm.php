<?php

namespace App\Http\Livewire;

use GeneralSettings;
use Livewire\Component;

class GenericSettingsForm extends Component
{
    public $site_name;
    public $site_active;
    public $auth_enabled;
    public $contact_email;

    public function __construct()
    {
        $this->site_name = app(GeneralSettings::class)->site_name;
        $this->site_active = app(GeneralSettings::class)->site_active;
        $this->auth_enabled = app(GeneralSettings::class)->auth_enabled;
        $this->contact_email = app(GeneralSettings::class)->contact_email;
    }

    public function save(GeneralSettings $generalSettings)
    {
        try {
            $generalSettings->site_name = $this->site_name;
            $generalSettings->site_active = $this->site_active;
            $generalSettings->auth_enabled = $this->auth_enabled;
            $generalSettings->contact_email = $this->contact_email;
            $generalSettings->save();
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => 'Settings were saved!'
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Settings could not be saved due to server error!'
            ]);
        }
        return;
    }

    public function render(\Codedge\Updater\UpdaterManager $updater)
    {
        return view('livewire.generic-settings-form', compact('updater'));
    }
}
