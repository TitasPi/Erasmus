<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Collection;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    // Index page (public)
    public function index(Collection $collection) {
        $albums = Album::where('collection_id', $collection->id)->all();
        // Return a view with collection's albums
    }

    // Preview album (public)
    public function preview(Collection $collection, Album $album) {

    }

    // Settings/Listing (private)
    public function albums(Collection $collection) {
        $albums = $collection->albums()->get();
        // dd($albums);
        // Return settings view for albums
        return view('dashboard.albums.index', compact('collection', 'albums'));
    }

    public function albumsImages(Collection $collection, Album $album) {
        $images = $album->images()->get();
        
        return view('dashboard.images.index', compact('collection', 'album', 'images'));
    }

    public function addAlbum(Collection $collection) {
        // TODO
    }

    public function editAlbum(Collection $collection, Album $album) {
        // TODO
    }

    public function removeAlbum(Collection $collection, Album $album) {
        // TODO
    }
}
