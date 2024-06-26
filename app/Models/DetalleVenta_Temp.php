<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta_Temp extends Model
{
    use HasFactory;

    protected $table='detalle_venta_temp';

    protected $primaryKey='id_det_vent_temp';

    public $timestamps=false;

    protected $fillable=[
        'id_producto',
        'id_venta',
        'cantidad',
        'tamanio',
        'id_asiento',
        'total'
    ];
}
