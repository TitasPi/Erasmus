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
            'icon' => 'required|max:255',
            'short_description' => 'required|string|max:512'
        ]);

        Collection::create([
            'name' => request('name'),
            'icon' => request('icon'),
            'short_description' => request('short_description')
        ]);
        return redirect()->route('dashboard.collections');
    }

    public function editCollectionView(Collection $collection) {
        return view('dashboard.collections.edit', compact('collection'));
    }
    public function editCollection(Collection $collection, Request $request) {
        $validated = $request->validate([
            'name_en' => 'max:255',
            'name_fr' => 'max:255',
            'icon' => 'required|max:255',
            'short_description_en' => 'max:512',
            'short_description_fr' => 'max:512'
        ]);

        $collection->update([
            'icon' => request('icon')
        ]);
        $collection->setTranslation('name', 'en', request('name_en'));
        $collection->setTranslation('name', 'fr', request('name_fr'));
        $collection->setTranslation('short_description', 'en', request('short_description_en'));
        $collection->setTranslation('short_description', 'fr', request('short_description_fr'));
        $collection->save();
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
