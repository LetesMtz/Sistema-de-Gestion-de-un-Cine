<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Asiento;
use App\Models\Cartelera;
use App\Models\DetalleVenta_Temp;
use App\Models\Pelicula;
use App\Models\Venta;
use App\Providers\AppServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class PagarController extends Controller
{
    public function index(string $id_pelicula, Request $request)
    {
        $hora_inicio = $request->hora_inicio;
        $dia = $request->dia;

        $det_vent_temp = DetalleVenta_Temp::select('detalle_venta_temp.id_det_vent_temp', 'producto.nombre as nombre_producto', 'detalle_venta_temp.cantidad', 'detalle_venta_temp.tamanio', 'producto.precio',
        'detalle_venta_temp.total', 'asiento.nombre as nombre_asiento')
        ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
        ->leftjoin('asiento', 'detalle_venta_temp.id_asiento', '=', 'asiento.id_asiento')
        ->get();

        $pelicula = Pelicula::all()
        ->where('id_pelicula', $id_pelicula);

        $boletos = Producto::all()
        ->where('id_tipo_producto', 4);

        $cartelera = Cartelera::select('id_sala')
        ->where('id_pelicula', $id_pelicula)
        ->first();

        $asientos = Asiento::all()
        ->where('id_sala', $cartelera->id_sala);

        return view('almacen.pagar.index', compact('det_vent_temp', 'boletos', 'asientos', 'id_pelicula', 'hora_inicio', 'dia', 'pelicula'));
    }

    public function AgregarBoleto(Request $request)
    {
        $producto = Producto::all()
        ->where('id_producto', $request->id_boleto);

        $asiento = Asiento::all()
        ->where('id_asiento', $request->id_asiento);

        $detalleVenta = new DetalleVenta_Temp();
        $detalleVenta->id_producto = $request->id_boleto;
        $detalleVenta->id_venta = 0;
        $detalleVenta->cantidad = 1;
        $detalleVenta->tamanio = '';
        $detalleVenta->total = $producto->first()->precio * $request->cantidad;
        $detalleVenta->id_asiento = $request->id_asiento;
        $detalleVenta->save();

        return back();
    }

    public function AgregarVenta(Request $request)
    {
        $cartelera = Cartelera::all()
        ->where('id_pelicula', $request->id_pelicula);

        $venta = new Venta();
        $venta->id_cartelera = $cartelera->first()->id_cartelera;
        $venta->id_sala = $cartelera->first()->id_sala;
        $venta->id_estado = 1;
        $venta->nombre_cliente = $request->nombre_cliente;
        $venta->apellido_cliente = $request->apellido_cliente;
        $venta->email_cliente = $request->email;
        $venta->hora = $request->hora_inicio;
        $venta->fecha = $request->dia;
        $venta->save();

        $ventaBuscar = Venta::orderBy('id_venta', 'desc')
        ->get();

        $detalleVentaTemp = DetalleVenta_Temp::all();

        $producto = Producto::all()
        ->where('id_producto', $request->id_boleto);

        $asiento = Asiento::all()
        ->where('id_asiento', $request->id_asiento);

        $totalVenta = 0;

        foreach ($detalleVentaTemp as $item)
        {
            $detalleVentaNuevo = new DetalleVenta();
            $detalleVentaNuevo->id_producto = $detalleVentaTemp->first()->id_producto;
            $detalleVentaNuevo->id_venta = $ventaBuscar->first()->id_venta;
            $detalleVentaNuevo->cantidad = $detalleVentaTemp->first()->cantidad;
            $detalleVentaNuevo->tamanio = $detalleVentaTemp->first()->tamanio;
            $detalleVentaNuevo->total = $detalleVentaTemp->first()->total;
            $detalleVentaNuevo->id_asiento = $detalleVentaTemp->first()->id_asiento;
            $detalleVentaNuevo->save();

            $totalVenta = $detalleVentaTemp->first()->total;
        }

        $ventaTotal = Venta::findOrFail($ventaBuscar->first()->id_venta);
        $ventaTotal->total = $totalVenta;
        $ventaTotal->save();

        DetalleVenta_Temp::query()->delete();

        return redirect()->action([HomeController::class, 'index']/*, ['parameterKey' => 'value']*/);
    }
}
