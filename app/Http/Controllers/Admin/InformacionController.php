<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\datos_info;
use App\Models\Informacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InformacionController extends Controller
{
    public $date;

    public function __construct() {
        $this->date = Carbon::now('America/Bogota');
        $this->middleware('auth');
    }
    public function index(){
        $informacion = Informacion::paginate(10);
        return view('views_admin.informacion.principal.index', ['informacion' => $informacion]);
    }

    public function store(Request $request){
        $extension_file_documento = pathinfo($request->file('imagen')->getClientOriginalName(), PATHINFO_EXTENSION);
        $ruta_file_documento = 'informacion/imagenes/';
        $nombre_file_documento = 'imagen_'.$this->date->isoFormat('YMMDDHmmss').'.'.$extension_file_documento;
        Storage::disk('public')->put($ruta_file_documento.$nombre_file_documento, File::get($request->file('imagen')));

        $nombre_completo_file_documento = $ruta_file_documento.$nombre_file_documento;

        $informacion = Informacion::create([
            'contenido' => $request['contenido'],
            'imagen' => $nombre_completo_file_documento,
            'estado' => $request['estado'],
            'fecha' => $this->date->format('y-m-d')
        ]);
        if($informacion->save()){
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La información se creó correctamente']);
        }else{
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La información no se creó correctamente']);
        }
    }

    public function show(Request $request){
        return Informacion::find($request['id']);
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
        $informacion = Informacion::find($request['id']);
        $informacion->update([
            'contenido' => $request['contenido'],
            'estado' => $request['estado']
        ]);
        if ($update_img) {
            Storage::delete($informacion->imagen);
            $informacion->update(['imagen' => $nombre_completo_file_documento]);
        }
        if($informacion->save()){
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La información se actualizo correctamente']);
        }else{
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La información no se actualizo correctamente']);
        }
    }

    public function delete($id){
        if($informacion = Informacion::find($id)->delete()) {
            // Storage::delete($promocion->imagen);
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'La información se elimino correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'La información no se elimino correctamente']);
        }
    }

    // datos de la empresa
    public function show_datos(Request $request){
        $datos = datos_info::latest()->take(1)->get();
        return view('views_admin.informacion.principal.datos', ['datos' => $datos]);
    }

    public function datos_create(Request $request){
        if($request['id']){
            $datos = datos_info::find($request['id']);
            if ($datos->update($request->all())) {
                return redirect()->back()->with(['create' => 1, 'mensaje' => 'Datos actualizados correctamente']);
            } else {
                return redirect()->back()->with(['create' => 0, 'mensaje' => 'Datos no se actualizarón correctamente']);
            }
        }

        $datos = datos_info::create($request->all());

        if ($datos->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Datos creados correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'Datos no se crearón correctamente']);
        }
        
    }

    public function show_datos_id(Request $request){
        return datos_info::find($request['id']);
    }
}
