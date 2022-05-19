<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Album extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'short_description', 'long_description'];

    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'date',
        'collection_id'
    ];

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function collection() {
        return $this->belongsTo(Collection::class);
    }
}
