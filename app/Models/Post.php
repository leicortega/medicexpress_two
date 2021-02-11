<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'fecha', 'titulo', 'slug', 'imagen', 'contenido', 'galeria', 'users_id'
    ];

    public function media_posts() {
        return $this->hasMany('App\Models\Media_post', 'posts_id');
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'posts_id');
    }

    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}
