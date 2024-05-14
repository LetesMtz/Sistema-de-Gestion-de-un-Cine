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

        if($request->tamanio != null)
        {
            //Crea un objeto donde se guardará
            $detalle = new DetalleVenta_Temp();
            $detalle->id_producto = $request->aguasId;
            $detalle->id_venta = 0;
            $detalle->cantidad = $request->cantidadAguas;
            $detalle->tamanio = $precioProd->first()->tamanio;
            $detalle->total = ($precioProd->first()->precio * $detalle->cantidad);
            $detalle->save();
        }
        else
        {
            $detalle = new DetalleVenta_Temp();
            $detalle->id_producto = $request->aguasId;
            $detalle->id_venta = 0;
            $detalle->cantidad = $request->cantidadAguas;
            $detalle->tamanio = 'Null';
            $detalle->total = ($precioProd->first()->precio * $detalle->cantidad);
            $detalle->save();
        }

        return redirect()->action([TiendaController::class, 'index']);
    }

    public function update(int $id, Request $request)
    {
        $detVentTempBuscar = DetalleVenta_Temp::select('producto.precio')
        ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
        ->where('id_det_vent_temp', $id)
        ->get();

        $detVentTemp = DetalleVenta_Temp::findOrFail($id);
        $detVentTemp->cantidad = $request->cantidad;
        $detVentTemp->total = $request->cantidad * $detVentTempBuscar->first()->precio;
        $detVentTemp->save();

        return back();
    }

    public function destroy(int $id)
    {
        //Busca coincidencia con id_det_vent_temp. Si encuentra el registro lo elimina de la BD.
        DetalleVenta_Temp::where('id_det_vent_temp', $id)->delete();
        
        return back();
    }
}
