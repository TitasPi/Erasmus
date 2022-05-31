<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Collection;
use Artisan;
use Config;
use GeneralSettings;
use Illuminate\Http\Request;
use Spatie\Backup\Commands\BackupCommand;

class SettingsController extends Controller
{
    public function index() {
        return view('dashboard.settings.index');
    }

    public function update(\Codedge\Updater\UpdaterManager $updater) {
        if ($updater->source()->isNewVersionAvailable()) {
            echo $updater->source()->getVersionInstalled() . '. There is update available: ' . $updater->source()->getVersionAvailable();
            echo 'System is being backed up and update will be installed';

            $versionAvailable = $updater->source()->getVersionAvailable();

            Artisan::call('backup:run');

            $release = $updater->source()->fetch($versionAvailable);

            $updater->source()->update($release);
        } else {
            echo 'You are running up to date version: ' . $updater->source()->getVersionInstalled();
        }
    }

    public function generic(\Codedge\Updater\UpdaterManager $updater) {

        return view('dashboard.settings.generic.index', compact('updater'));
    }

    public function save_generic(GeneralSettings $generalSettings, Request $request) {
        // dd(request('site_active'));
        $request->validate([
            'site_name' => 'required|string|max:20',
            'contact_email' => 'required|email'
        ]);

        $generalSettings->site_name = request('site_name');
        $generalSettings->site_active = request('site_active') ?? false;
        $generalSettings->contact_email = request('contact_email');
        $generalSettings->auth_enabled = request('auth_enabled') ?? false;
        $generalSettings->save();

        return redirect()->back();
    }

    public function welcome() {
        return view('dashboard.settings.welcome.index');
    }
}
