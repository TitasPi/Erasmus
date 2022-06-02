<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Collection;
use App\Models\Image;
use File;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as FacadesImage;
use Storage;

class ImageController extends Controller
{
    // TODO:
    
    // Displaying images
    // Either through CDN, Nginx, custom route or static folder
    
    // Removing images
    
    // Displaying images
    public function index(Image $image) {
        return asset($image->src);
    }

    public function uploadView() {
        return view('dashboard.images.upload');
    }
    
    public function upload(Request $request, Collection $collection, Album $album) {
        $request->validate([
            'image' => 'file|required|max:10000000|mimes:png,jpg,jpeg'
        ]);

        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('thumbnail');

        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath);
        }

        $img = FacadesImage::make($image->getRealPath());
        
        $img->resize($img->width()/4, $img->height()/4, function($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = public_path('images');
        
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath);
        }

        $image->move($destinationPath, $input['imagename']);

        Image::create([
            'album_id' => $album->id,
            'src' => $input['imagename']
        ]);

        return redirect()->route('dashboard.albums.images', ['collection' => $collection->id, 'album' => $album->id]);
    }

    public function remove(Collection $collection, Album $album, Image $image) {
        File::delete(public_path('images/' . $image->src));
        File::delete(public_path('thumbnail/' . $image->src));
        $image->delete();
        return back();
        // TODO: removing images from db and storage
    }

    public function addToWelcomePage(Collection $collection, Album $album, Image $image) {
        $image->is_on_welcome_page = true;
        $image->save();
        return back();
    }
    public function removeFromWelcomePage(Collection $collection, Album $album, Image $image) {
        $image->is_on_welcome_page = false;
        $image->save();
        return back();
    }
}
