<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    #¿Qué tabla será llamada?
    protected $table='producto';

    protected $primaryKey='id_producto';

    public $timestamps=false;

    protected $fillable=[
        'id_tipo_producto',
        'id_estado',
        'nombre',
        'cantidad',
        'precio',
        'imagen',
        'tamanio'
    ];
}
