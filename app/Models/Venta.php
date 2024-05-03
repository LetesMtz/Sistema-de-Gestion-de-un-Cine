<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table='venta';

    protected $primaryKey='id_venta';

    public $timestamps=false;

    protected $fillable=[
        'id_cartelera',
        'id_sala',
        'id_estado',
        'nombre_cliente',
        'apellido_cliente',
        'email_cliente',
        'dia',
        'hora',
        'total'
    ];
}
