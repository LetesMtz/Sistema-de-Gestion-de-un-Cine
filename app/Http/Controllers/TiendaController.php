<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
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

        $detalle = new DetalleVenta();
        $detalle->id_producto = $request->aguas;
        $detalle->id_venta = 0;
        $detalle->cantidad = $request->cantidadAguas;
        $detalle->tamanio = 'Null';
        $detalle->save();

        return redirect()->action([TiendaController::class, 'index']);
    }
}
