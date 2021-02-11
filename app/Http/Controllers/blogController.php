<?php

namespace App\Http\Controllers;

// use App\Models\Blog\Media_post ;

use App\Models\Blog\Comment as BlogComment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Media_post;
use App\Models\Comment;
class blogController extends Controller
{
    public function index(){
        $posts = Post::paginate(10);

        return view('blog.index', ['posts' => $posts]);
    }

    public function vistas(Post $post,  Request $request){
        // $post = Post::with('media_posts')->find($request['id']);
        // $post = Post::find('id');
        return view('blog.vistas', compact('post'));
    }
    public function comment(post $post, Request $request){

        $post_comment = new BlogComment();

       $post_comment->nombre = $request->nombre;
       $post_comment->correo = $request->correo;
       $post_comment->contenido = $request->contenido;

       $post_comment->save();
       return redirect()->route('blog.vistas', $post);
    }
}
