<?php

namespace App\Http\Controllers;

use App\Models\datos_info;
use Illuminate\Http\Request;

class servicosController extends Controller
{
    public function servicios(){
        $datos = datos_info::latest()->take(1)->get();
        return view('servicios.index', ['datos' => $datos]);
    }
}
