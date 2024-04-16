<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table='detalle_venta_temp';

    protected $primarykey='id_det_vent_temp';

    public $timestamps=false;

    protected $fillable=[
        'id_producto',
        'id_venta',
        'cantidad',
        'tamanio'
    ];
}
