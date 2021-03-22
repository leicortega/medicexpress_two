<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datos_info extends Model
{
    use HasFactory;
    protected $table = 'datos_info';

    protected $fillable = [
        'telefono', 'correo', 'facebook', 'instagram', 'twitter'
    ];
}
