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
}
