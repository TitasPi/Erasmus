<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Collection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AlbumController extends Controller
{
    // Index page (public)
    public function index(String $lang, Collection $collection, Album $album) {
        return view('albums.list', compact('collection', 'album'));
    }

    // Settings/Listing (private)
    public function albums(Collection $collection) {
        $albums = $collection->albums()->get();
        // Return settings view for albums
        return view('dashboard.albums.index', compact('collection', 'albums'));
    }

    public function albumsImages(Collection $collection, Album $album) {
        $images = $album->images()->get();
        
        return view('dashboard.images.index', compact('collection', 'album', 'images'));
    }

    public function addAlbumView(Collection $collection) {
        return view('dashboard.albums.new', compact('collection'));
    }
    public function addAlbum(Collection $collection, Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'date' => 'required',
            'collection' => 'required'
        ]);
        if (Collection::where('id', '=', $validated['collection'])->count() == 0) {
            throw ValidationException::withMessages([
              'collection' => 'Such collection not found',
            ]);
        }

        Album::create([
            'title' => request('title'),
            'short_description' => request('short_description'),
            'long_description' => request('long_description') ?? '',
            'date' => Carbon::parse(str_replace('/', '-', request('date')))->locale('us')->format('Y-m-d'),
            'collection_id' => request('collection')
        ]);

        return redirect()->route('dashboard.albums', ['collection' => $collection->id]);
    }

    public function editAlbum(Collection $collection, Album $album) {
        return view('dashboard.albums.edit', compact('collection', 'album'));
    }
    public function edit(Collection $collection, Album $album, Request $request) {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_fr' => 'required|string|max:255',
            'short_description_en' => 'required|string|max:255',
            'short_description_fr' => 'required|string|max:255',
            'date' => 'required',
            'collection' => 'required'
        ]);
        if (Collection::where('id', '=', $validated['collection'])->count() == 0) {
            throw ValidationException::withMessages([
              'collection' => 'Such collection not found',
            ]);
        }
        $album->setTranslation('title', 'en', request('title_en'));
        $album->setTranslation('title', 'fr', request('title_fr'));
        $album->setTranslation('short_description', 'en', request('short_description_en'));
        $album->setTranslation('short_description', 'fr', request('short_description_fr'));
        $album->setTranslation('long_description', 'en', request('long_description_en'));
        $album->setTranslation('long_description', 'fr', request('long_description_fr'));

        $album->update([
            'date' => Carbon::parse(str_replace('/', '-', request('date')))->locale('us')->format('Y-m-d'),
            'collection_id' => request('collection')
        ]);
        
        return redirect()->route('dashboard.albums', ['collection' => $collection->id]);
    }

    public function removeAlbum(Collection $collection, Album $album) {
        // TODO
    }
}
