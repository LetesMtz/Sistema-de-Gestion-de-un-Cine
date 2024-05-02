<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table='detalle_venta';

    protected $primaryKey='id_det_venta';

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
