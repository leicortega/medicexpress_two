<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'fecha', 'nombre', 'correo', 'contenido', 'posts_id'
    ];
}
