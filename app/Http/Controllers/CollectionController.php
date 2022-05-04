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

    public function addCollection() {
        // TODO
    }

    public function editCollection(Collection $collection) {
        // TODO
    }

    public function removeCollection(Collection $collection) {
        // TODO
    }

    public function hideCollection(Collection $collection) {
        // TODO
    }

    public function showCollection(Collection $collection) {
        // TODO
    }
}
