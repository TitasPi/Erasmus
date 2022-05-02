<?php

namespace App\Http\Controllers;

use App\Models\NavigationItem;
use Illuminate\Http\Request;

class WelcomeSettingsController extends Controller
{
    public function index() {
        $links = NavigationItem::all();
        return view('dashboard.settings.welcome.navigation.index', compact('links'));
    }

    public function createForm() {
        return view('dashboard.settings.welcome.navigation.new');
    }
    public function create(Request $request) {
        $validated = $request->validate([
          'title' => 'required|string|max:255',
          'link' => 'required|string|url'
        ]);

        NavigationItem::create([
          'title' => $validated['title'],
          'link' => $validated['link'],
          'active' => false
        ]);

        return redirect()->route('dashboard.settings.welcome');
    }

    public function hide(NavigationItem $navigationItem) {
        $navigationItem->active = false;
        $navigationItem->save();

        return redirect()->back();
    }
    public function show(NavigationItem $navigationItem) {
        $navigationItem->active = true;
        $navigationItem->save();

        return redirect()->back();
    }

    public function editForm(NavigationItem $navigationItem) {
        return view('dashboard.settings.welcome.navigation.edit', ['link' => $navigationItem]);
    }
    public function edit(NavigationItem $navigationItem, Request $request) {
        $validated = $request->validate([
          'title' => 'required|string|max:255',
          'link' => 'required|string|url'
        ]);
        
        $navigationItem->update($validated);
        $navigationItem->save();

        return redirect()->route('dashboard.settings.welcome');
    }

    public function remove(NavigationItem $navigationItem) {
        $navigationItem->delete();

        return redirect()->back();
    }
}
