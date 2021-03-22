<?php

namespace App\Http\Controllers;

use App\Models\datos_info;
use App\Models\Mision_Vision;
use Illuminate\Http\Request;

class nosotrosController extends Controller
{
    public function index()
    {
        $nosotros_mision = Mision_Vision::latest()->take(1)->where('estado','=','activo')->where('tipo','=','mision')->get();
        $nosotros_vision = Mision_Vision::latest()->take(1)->where('estado','=','activo')->where('tipo','=','vision')->get();
        $datos = datos_info::latest()->take(1)->get();
        // return dd($about);
        return view('nosotros.index', ['nosotros_mision' => $nosotros_mision, 'nosotros_vision' => $nosotros_vision, 'datos' => $datos]);
    }
}
