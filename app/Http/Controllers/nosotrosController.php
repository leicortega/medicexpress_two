<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nosotrosController extends Controller
{
    public function index()
    {
        return view('nosotros.index');
    }
}
