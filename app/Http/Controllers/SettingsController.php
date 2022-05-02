<?php

namespace App\Http\Controllers;

use Config;
use GeneralSettings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() {
        return view('dashboard.settings.index');
    }

    public function generic() {
        $git_output = shell_exec('git status -uno');

        $update_available = !strpos($git_output, 'Your branch is up to date');

        return view('dashboard.settings.generic.index', compact('update_available'));
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
