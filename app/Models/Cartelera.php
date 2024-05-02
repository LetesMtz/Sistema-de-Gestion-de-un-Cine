<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartelera extends Model
{
    use HasFactory;

    protected $table='cartelera';

    protected $primaryKey='id_cartelera';

    public $timestamps=false;

    protected $fillable=[
        'id_pelicula',
        'id_sala',
        'id_estado',
        'hora_inicio',
        'hora_fin',
        'dia',
        'id_tipo_cartelera'
    ];
}
