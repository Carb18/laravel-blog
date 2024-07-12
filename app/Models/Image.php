<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Relacion uno a muchos polimorfica

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


    // Relacion polimorfica
    public function commentable(){
        return $this->morphTo();
    }
}
