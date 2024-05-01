<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\DetalleVenta_Temp;
use App\Models\Producto;
use App\Models\Tamanio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class TiendaController extends Controller
{
    public function index()
    {
        $productos = Producto::all();

        $tamanio = Tamanio::all();

        return view('almacen.tienda.index', compact('productos', 'tamanio'));
    }

    public function store(Request $request)
    {
        //Busca el precio del producto seleccionado para hacer un total al mutliplicar el precio * cantidad
        $precioProd = Producto::all()
        ->where('id_producto', $request->aguasId);

        //Crea un objeto donde se guardará
        $detalle = new DetalleVenta();
        $detalle->id_producto = $request->aguasId;
        $detalle->id_venta = 0;
        $detalle->cantidad = $request->cantidadAguas;
        $detalle->tamanio = $precioProd->first()->tamanio;
        $detalle->total = ($precioProd->first()->precio * $detalle->cantidad);
        $detalle->save();

        return redirect()->action([TiendaController::class, 'index']);
    }

    public function destroy(int $id)
    {
        //Busca coincidencia con id_det_vent_temp. Si encuentra el registro lo elimina de la BD.
        DetalleVenta_Temp::where('id_det_vent_temp', $id)->delete();
        
        return back();
    }
}
