<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'src'
    ];

    public function album() {
        return $this->hasOne(Album::class);
    }
}
