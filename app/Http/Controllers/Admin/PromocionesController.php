<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promocion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PromocionesController extends Controller
{
    public $date;

    public function __construct() {
        $this->date = Carbon::now('America/Bogota');
        $this->middleware('auth');
    }

    public function index(){
        $promociones = Promocion::paginate(10);
        return view('views_admin.promociones.index',compact('promociones'));
    }

    public function store(Request $request){

        $extension_file_documento = pathinfo($request->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_documento = 'promociones/imagenes/';
        $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'.'.$extension_file_documento;
        Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($request->file('imagen')));

        $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;

        $Promocion = Promocion::create([
            'titulo' => $request['titulo'],
            'precio' => $request['precio'],
            'descripcion' => $request['descripcion'],
            'imagen' => $nombre_completo_file_documento,
            'fecha' => $this->date->format('y-m-d'),
            'estado' => $request['estado']
        ]);
        if($Promocion->save()){
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La promoción se creó correctamente']);
        }else{
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La promoción no se creó correctamente']);
        }
    }

    public function show(Request $request){
        return Promocion::find($request['id']);
    }

    public function update(Request $request){
        $update_img = false;
        if($request->file('imagen')){
            $extension_file_documento = pathinfo($request->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_documento = 'promociones/imagenes/';
            $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'.'.$extension_file_documento;
            Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($request->file('imagen')));
            $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;
            $update_img = ($request['id']) ? true : false;

        }
        $promocion = Promocion::find($request['id']);
        $promocion->update([
            'titulo' => $request['titulo'],
            'precio' => $request['precio'],
            'descripcion' => $request['descripcion'],
            'estado' => $request['estado']
        ]);
        if ($update_img) {
            Storage::delete($promocion->imagen);
            $promocion->update(['imagen' => $nombre_completo_file_documento]);
        }
        if($promocion->save()){
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La promoción se actualizo correctamente']);
        }else{
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La promoción no se actualizo correctamente']);
        }
    }

    public function delete($id){
        if($promocion = Promocion::find($id)->delete()) {
            // Storage::delete($promocion->imagen);
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La promoción se elimino correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La promoción no se elimino correctamente']);
        }
    }
}
