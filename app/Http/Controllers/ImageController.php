<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

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
    
    public function upload(Request $request) {
        // TODO: Receiving & compressing images
    }

    public function remove(Image $image) {
        // TODO: removing images from db and storage
    }
}
