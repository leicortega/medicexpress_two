<?php

namespace App\Http\Controllers;

// use App\Models\Blog\Media_post ;

use App\Models\Blog\Comment as BlogComment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Media_post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class blogController extends Controller
{
    public $date;

    public function __construct() {
        $this->date = Carbon::now('America/Bogota');
        // $this->middleware('auth');
    }

    public function index(){
        $posts = Post::paginate(10);

        foreach ($posts as $key => $post) {
            $post['author'] = User::find($post->users_id)->name;
            $post['comments'] = Comment::where('posts_id', $post->id)->count();
        }

        return view('blog.index', ['posts' => $posts]);
    }

    public function vistas(Post $post, Comment $comment, Request $request){
        $post['author'] = User::find($post->users_id)->name;
        $posts = Post::latest()->take(3)->get();
        // dd($posts);
        return view('blog.vistas', compact('post'),compact('posts'));
    }

    public function comment(Post $post, Comment $comment, Request $request){
        
        
        $comment = Comment::create([
            'fecha' => $this->date->format('Y-m-d'),
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'contenido' => $request->contenido,
            'posts_id' => $request->post_id
        ]);
        
        
       return redirect()->route('blog.vistas', $post);
    }
   

}
