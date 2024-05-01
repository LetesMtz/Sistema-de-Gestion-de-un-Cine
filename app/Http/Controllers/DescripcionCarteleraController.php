<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class DescripcionCarteleraController extends Controller
{
    public function index(int $id_peliculla)
    {
        $peliculaDetalle = Cartelera::select('p.id_pelicula', 'p.titulo', 'p.portada', 'cl.nombre as clasificacion', 'p.duracion',
        'cartelera.id_sala as sala', 'p.trailer', 'cartelera.dia', 'cartelera.hora_inicio', 'p.sinopsis')
        ->join('pelicula as p', 'cartelera.id_pelicula', '=', 'p.id_pelicula')
        ->join('clasificacion as cl', 'p.id_clasificacion', '=', 'cl.id_clasificacion')
        ->where('p.id_pelicula', '=', $id_peliculla)
        ->get();

        // $peliculaDetalle = Pelicula::select('titulo')
        // ->where('id_pelicula', '=', $id_peliculla)
        // ->get();

        return view('almacen.descripcion.index', compact('peliculaDetalle'));
    }
}
