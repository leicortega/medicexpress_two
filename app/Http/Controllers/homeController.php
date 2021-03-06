<?php

namespace App\Http\Controllers;

use App\Models\datos_info;
use App\Models\DetalleCotizacion;
use App\Models\Informacion;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Promocion;
use App\Models\User;

class homeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        $promociones = Promocion::latest()->take(1)->where('estado','=','activo')->get();
        $informacion = Informacion::latest()->take(1)->where('estado','=','activo')->get();
        $datos = datos_info::latest()->take(1)->get();
        foreach ($posts as $key => $post) {
            $post['author'] = User::find($post->users_id)->name;
        }
        return view('index', ['posts' => $posts, 'promociones' => $promociones, 'informacion' => $informacion, 'datos'=> $datos]);
    }
}
