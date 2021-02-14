<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class contactoController extends Controller
{
    public function contacto(){
        return view('contacto');
    }

    public function store(Request $request){
        $correo = new ContactanosMailable($request->all());
        Mail::to('oscarruiz2614@gmail.com')->send($correo);
        return redirect()->route('contacto')->with('info','Mensaje enviado');
    }
}
