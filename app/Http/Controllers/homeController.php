<?php

namespace App\Http\Controllers;

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
        foreach ($posts as $key => $post) {
            $post['author'] = User::find($post->users_id)->name;
        }
        return view('index', compact('posts'), compact('promociones'));
    
    }
}
