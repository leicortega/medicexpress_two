<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class homeController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        // ['posts' => $posts]
        return view('index', compact('posts'));
        // return view('index');
    }
}
