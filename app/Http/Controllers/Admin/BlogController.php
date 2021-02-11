<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Media_post;


class BlogController extends Controller
{
    public $date;

    public function __construct() {
        $this->date = Carbon::now('America/Bogota');
        $this->middleware('auth');
    }

    public function index() {
        $posts = Post::with('users')->paginate(10);

        return view('views_admin.blog.index', ['posts' => $posts]);
    }

    public function crear() {
        return view('views_admin.blog.crear');
    }

    public function crear_post(Request $request) {
        $update_img = false;
        if ($request->file('imagen')) {
            $extension_file_documento = pathinfo($request->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_documento = 'blog/post/imagenes/';
            $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'.'.$extension_file_documento;
            Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($request->file('imagen')));

            $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;
            
            $update_img = ($request['id']) ? true : false;
        }

        if ($request['id']) {
            $post = Post::find($request['id']);

            $post->update([
                'titulo' => $request['titulo'],
                'slug' => Str::slug($request['titulo']),
                'contenido' => $request['contenido']
            ]);
            if ($update_img) {
                Storage::delete($post->imagen);
                $post->update(['imagen' => $nombre_completo_file_documento]);
            }
        } else {
            $post = Post::create([
                'fecha' => $this->date->format('Y-m-d'),
                'titulo' => $request['titulo'],
                'slug' => Str::slug($request['titulo']),
                'imagen' => $nombre_completo_file_documento,
                'contenido' => $request['contenido'],
                'galeria' => $request['galeria'],
                'users_id' => auth()->user()->id
            ]);
        }

        if ($request->file('input_galeria')) {
            foreach ($request->file('input_galeria') as $num => $imagen) {
                $extension_file_documento = pathinfo($imagen->getClientOriginalName(), PATHINFO_EXTENSION);
                $ruta_file_documento = 'blog/post/galeria/';
                $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'_'.$num.'.'.$extension_file_documento;
                Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($imagen));

                $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;

                Media_post::create([
                    'imagen' => $nombre_completo_file_documento,
                    'posts_id' => $post->id
                ]);
            }
        }

        $mensaje = ($request['id']) ? 'Post actualizado correctamente' : 'Post creado correctamente';

        return redirect()->route('admin.blog')->with(['create' => 1, 'mensaje' => $mensaje]);
    }

   
    public function ver(Request $request) {
        $post = Post::with('media_posts')->find($request['id']);
        
        return view('views_admin.blog.ver', ['post' => $post]);
    }

    public function delete($id) {
        if($post = Post::find($id)->delete()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'El post se elimino correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'El post NO se elimino correctamente']);
        }
    }

    public function delete_media($id) {
        if($media = Media_post::find($id)->delete()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Imagen eliminada correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La imagen NO se elimino correctamente']);
        }
    }

}
