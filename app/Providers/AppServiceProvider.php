<?php

namespace App\Providers;

use App\Models\DetalleVenta;
use App\Models\DetalleVenta_Temp;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $det_vent_temp = DetalleVenta_Temp::select('detalle_venta_temp.id_det_vent_temp', 'producto.nombre', 'detalle_venta_temp.cantidad', 'detalle_venta_temp.tamanio', 'producto.precio',
        'detalle_venta_temp.total')
        ->join('producto', 'detalle_venta_temp.id_producto', '=', 'producto.id_producto')
        ->get();

        view()->share('detalles_temporales', $det_vent_temp);
    }
}
