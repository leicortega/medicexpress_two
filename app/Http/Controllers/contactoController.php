<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use App\Models\datos_info;
use Illuminate\Support\Facades\Mail;

class contactoController extends Controller
{
    public function contacto(){
        $datos = datos_info::latest()->take(1)->get();
        return view('contacto', ['datos' => $datos]);
    }

    public function store(Request $request){
        $correo = new ContactanosMailable($request->all());
        Mail::to('oscarruiz2614@gmail.com')->send($correo);
        return redirect()->route('contacto')->with('info','Mensaje enviado');
    }
}
