<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Asignacion masiva

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'user_id'
    ];

    // Relacion uno a uno inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacion uno a muchos polimorfica
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    // Relacion muchos a muchos polimorfica para tags
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }



}
