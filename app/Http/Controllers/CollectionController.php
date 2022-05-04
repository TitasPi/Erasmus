<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    // Index page (public)
    public function index() {
        $collections = Collection::where('active', true)->all();
        // Return a view with collections
    }

    // Settings/Listing (private)

    public function collections() {
        $collections = Collection::all();

        // Return settings view for collections
        return view('dashboard.collections.index', compact('collections'));
    }

    public function addCollectionView() {
        return view('dashboard.collections.new');
    }
    public function addCollection(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|max:5',
            'short_description' => 'required|string|max:255'
        ]);

        Collection::create($validated);
        return redirect()->route('dashboard.collections');
    }

    public function editCollectionView(Collection $collection) {
        return view('dashboard.collections.edit', compact('collection'));
    }
    public function editCollection(Collection $collection, Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'required|max:5',
            'short_description' => 'required|string|max:255'
        ]);

        $collection->update($validated);
        return redirect()->route('dashboard.collections');
    }

    public function removeCollection(Collection $collection) {
        $collection->delete();
        return redirect()->route('dashboard.collections');
    }

    public function hideCollection(Collection $collection) {
        $collection->active = false;
        $collection->save();

        return redirect()->back();
    }

    public function showCollection(Collection $collection) {
        $collection->active = true;
        $collection->save();

        return redirect()->back();
    }
}
