<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use Illuminate\Http\Request;

class CarteleraController extends Controller
{
    public function index()
    {
        $carteleraCompleta = Cartelera::select('cartelera.id_pelicula', 'pelicula.titulo', 'pelicula.sinopsis', 'clasificacion.nombre as clasificacion', 'clasificacion.descripcion',
        'pelicula.duracion', 'pelicula.trailer', 'pelicula.portada')
        ->join('pelicula', 'cartelera.id_pelicula', '=', 'pelicula.id_pelicula')
        ->join('clasificacion', 'pelicula.id_clasificacion', '=', 'clasificacion.id_clasificacion')
        ->where('cartelera.id_tipo_cartelera', 1)
        ->where('cartelera.id_estado', 1)
        ->orderBy('pelicula.titulo')
        ->get();

        $carteleraPreventa = Cartelera::select('cartelera.id_pelicula', 'pelicula.titulo', 'pelicula.sinopsis', 'clasificacion.nombre as clasificacion', 'clasificacion.descripcion',
        'pelicula.duracion', 'pelicula.trailer', 'pelicula.portada')
        ->join('pelicula', 'cartelera.id_pelicula', '=', 'pelicula.id_pelicula')
        ->join('clasificacion', 'pelicula.id_clasificacion', '=', 'clasificacion.id_clasificacion')
        ->where('cartelera.id_tipo_cartelera', 2)
        ->where('cartelera.id_estado', 1)
        ->orderBy('pelicula.titulo')
        ->get();

        return view('almacen.cartelera.index', compact('carteleraCompleta', 'carteleraPreventa'));
    }
}
