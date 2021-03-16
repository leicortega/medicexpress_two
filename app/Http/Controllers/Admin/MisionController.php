<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mision_Vision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MisionController extends Controller
{
    public $date;

    public function __construct() {
        $this->date = Carbon::now('America/Bogota');
        $this->middleware('auth');
    }
    public function index(){
        $nosotros = Mision_Vision::paginate(10);
        return view('views_admin.informacion.mision_vision.index', ['nosotros' => $nosotros]);
    }

    public function store(Request $request){
        $extension_file_documento = pathinfo($request->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_documento = 'informacion/mision_vision/';
        $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'.'.$extension_file_documento;
        Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($request->file('imagen')));

        $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;

        $mision_vision = Mision_Vision::create([
            'tipo' => $request['tipo'],
            'contenido' => $request['contenido'],
            'imagen' => $nombre_completo_file_documento,
            'fecha' => $this->date->format('y-m-d'),
            'estado' => $request['estado']
        ]);

        if($mision_vision->save()){
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La información se creó correctamente']);
        }else{
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La información no se creó correctamente']);
        }

    }

    public function show(Request $request){
        return Mision_Vision::find($request['id']);
    }

    public function update(Request $request){
        $update_img = false;
        if($request->file('imagen')){
            $extension_file_documento = pathinfo($request->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);
            $ruta_file_documento = 'informacion/imagenes/';
            $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'.'.$extension_file_documento;
            Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($request->file('imagen')));
    
            $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;
            $update_img = ($request['id']) ? true : false;

        }
        $mision_vision = Mision_Vision::find($request['id']);
        $mision_vision->update([
            'tipo' => $request['tipo'],
            'contenido' => $request['contenido'],
            'estado' => $request['estado']
        ]);
        if ($update_img) {
            Storage::delete($mision_vision->imagen);
            $mision_vision->update(['imagen' => $nombre_completo_file_documento]);
        }
        if($mision_vision->save()){
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La información se actualizo correctamente']);
        }else{
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La información no se actualizo correctamente']);
        }
    }

    public function delete($id){
        if($mision_vision = Mision_Vision::find($id)->delete()) {
            // Storage::delete($promocion->imagen);
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La información se elimino correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La información no se elimino correctamente']);
        }
    }
}
