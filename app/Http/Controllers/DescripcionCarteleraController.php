<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class DescripcionCarteleraController extends Controller
{
    public function index(string $id_peliculla)
    {
        $peliculaDetalle = Cartelera::select('pelicula.titulo', 'pelicula.portada', 'clasificacion.nombre as clasificacion', 'pelicula.duracion',
        'cartelera.id_sala as sala', 'pelicula.trailer', 'cartelera.dia', 'cartelera.hora_inicio', 'pelicula.sinopsis')
        ->join('pelicula', 'cartelera.id_pelicula', '=', 'pelicula.id_pelicula')
        ->join('clasificacion', 'pelicula.id_clasificacion', '=', 'clasificacion.id_clasificacion')
        ->where('pelicula.id_pelicula', '=', $id_peliculla)
        ->get();
        // $peliculaDetalle = Pelicula::select('titulo')
        // ->where('id_pelicula', '=', $id_peliculla)
        // ->get();

        return view('almacen.descripcion.index', compact('peliculaDetalle'));
    }
}
