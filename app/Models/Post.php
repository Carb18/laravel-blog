<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//Registrando un observador
#[ObservedBy(PostObserver::class)]
class Post extends Model
{
    use HasFactory;


    // Asignacion masiva

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'body',
        'user_id'
    ];

    protected function title(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
            get: fn ($value) => ucfirst($value),
        );
    }

    // Agregando campos que no existen

    protected function image(): Attribute {
        return new Attribute(
            get: fn () => $this->image_path ?? 'https://static.thenounproject.com/png/1211233-200.png',
        );


    }

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
