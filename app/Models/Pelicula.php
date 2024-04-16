<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    #¿Qué tabla será llamada?
    protected $table='pelicula';

    protected $primarykey='id_pelicula';

    public $timestamps=false;

    protected $fillable=[
        'id_estado',
        'id_clasificacion',
        'titulo',
        'sinopsis',
        'duracion',
        'genero',
        'portada',
        'trailer'
    ];
}
