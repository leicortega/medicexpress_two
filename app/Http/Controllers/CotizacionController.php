<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\DetalleCotizacion;
use App\Models\ServiciosDetalleCotizacion;
class CotizacionController extends Controller
{
    public function index() {
        $cotizacion = DetalleCotizacion::all();
        return view('views_admin.cotizacion.index', ['cotizaciones' => $cotizacion]);
    }

    public function create(Request $request) {
        if ($request['id']) {
            $cotizacion = DetalleCotizacion::find($request['id']);

            if ($cotizacion->update($request->all())) {
                return redirect()->back()->with(['create' => 1, 'mensaje' => 'El servicio de cotizacion se actualizado correctamente']);
            } else {
                return redirect()->back()->with(['create' => 0, 'mensaje' => 'El servicio de cotizacion NO se actualizado correctamente']);
            }
        }

        $cotizacion = DetalleCotizacion::create($request->all());

        if ($cotizacion->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'El servicio de cotizacion se creo correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'El servicio de cotizacion NO se creo correctamente']);
        }
    }

    public function show(Request $request) {
        return DetalleCotizacion::find($request['id']);
    }

    public function delete($id) {
        if (DetalleCotizacion::find($id)->delete()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'El servicio de cotizacion se eliminado correctamente']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'El servicio de cotizacion NO se eliminado correctamente']);
        }
    }

    public function show_items(Request $request) {
        return ServiciosDetalleCotizacion::where('detalle_cotizacion_id', $request['id'])->get();
    }

    public function create_item(Request $request) {
        ServiciosDetalleCotizacion::create($request->all());

        return ['id' => $request['detalle_cotizacion_id']];
    }
}
