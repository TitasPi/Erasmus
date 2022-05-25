<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Collection extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['name', 'short_description'];

    protected $fillable = [
        'name',
        'icon',
        'short_description'
    ];

    public function albums() {
        return $this->hasMany(Album::class);
    }

    public function welcome_images() {
        $images = [];
        $imgCount = 0;
        foreach ($this->albums as $album) {
            foreach ($album->images as $image) {
                if ($imgCount >= 3) continue;
                if (!$image->is_on_welcome_page) continue;
                $images[] = $image->src;
                $imgCount++;
            }
        }

        for ($i=$imgCount; $i < 3; $i++) { 
            $images[] = '';
            $imgCount++;
        }
        return $images;
    }
}
