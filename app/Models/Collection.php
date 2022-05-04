<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'short_description'
    ];

    public function albums() {
        return $this->hasMany(Album::class);
    }
}
