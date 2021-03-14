<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $ruta_file_documento = 'promociones/imagenes/';
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
}
