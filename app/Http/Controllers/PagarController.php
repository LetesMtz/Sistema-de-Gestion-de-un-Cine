<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Asiento;
use App\Models\Cartelera;
use App\Providers\AppServiceProvider;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PagarController extends Controller
{
    public function index(string $id_pelicula)
    {

        $det_vent_temp = DetalleVenta::select('detalle_venta_temp.id_det_vent_temp', 'producto.nombre as nombre_producto', 'detalle_venta_temp.cantidad', 'detalle_venta_temp.tamanio', 'producto.precio',
        'detalle_venta_temp.total', 'asiento.nombre as nombre_asiento')
        ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
        ->leftjoin('asiento', 'detalle_venta_temp.id_asiento', '=', 'asiento.id_asiento')
        ->get();

        $boletos = Producto::all()
        ->where('id_tipo_producto', 4);

        $cartelera = Cartelera::select('id_sala')
        ->where('id_pelicula', $id_pelicula)
        ->first();

        $asientos = Asiento::all()
        ->where('id_sala', $cartelera->id_sala);

        return view('almacen.pagar.index', compact('det_vent_temp', 'boletos', 'asientos', 'id_pelicula'));
    }

    public function AgregarBoleto(Request $request)
    {
        $producto = Producto::all()
        ->where('id_producto', $request->id_boleto);

        $asiento = Asiento::all()
        ->where('id_asiento', $request->id_asiento);

        $detalleVenta = new DetalleVenta();
        $detalleVenta->id_producto = $request->id_boleto;
        $detalleVenta->id_venta = 0;
        $detalleVenta->cantidad = 1;
        $detalleVenta->tamanio = '';
        $detalleVenta->total = $producto->first()->precio * $request->cantidad;
        $detalleVenta->id_asiento = $request->id_asiento;
        $detalleVenta->save();

        return back();
    }
}
