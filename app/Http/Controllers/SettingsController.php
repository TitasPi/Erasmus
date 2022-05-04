<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Collection;
use Config;
use GeneralSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        return view('dashboard.settings.index');
    }

    public function generic(\Codedge\Updater\UpdaterManager $updater) {

        return view('dashboard.settings.generic.index', compact('updater'));
    }

    public function save_generic(GeneralSettings $generalSettings, Request $request) {
        // dd(request('site_active'));
        $request->validate([
            'site_name' => 'required|string|max:20'
        ]);

        $generalSettings->site_name = request('site_name');
        $generalSettings->site_active = request('site_active') ?? false;
        $generalSettings->save();

        return redirect()->back();
    }

    public function welcome() {
        return view('dashboard.settings.welcome.index');
    }
}
