<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mision_Vision extends Model
{
    use HasFactory;
    protected $table = 'mision_vision';

    protected $fillable = ['tipo', 'contenido', 'imagen', 'fecha','estado'];
}
