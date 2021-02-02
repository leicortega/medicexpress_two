<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class servicosController extends Controller
{
    public function servicios(){
        return view('servicios.index');
    }
}
