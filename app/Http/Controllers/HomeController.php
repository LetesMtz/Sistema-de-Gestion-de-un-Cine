<?php

namespace App\Http\Controllers;

use App\Models\Cartelera;
use App\Models\Pelicula;
use App\Models\Estado;
use App\Models\Producto;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\XdebugDriver;

class HomeController extends Controller
{
    public function index()
    {
        //Todas las consultas de esta funcion seran llamados al iniciar la vista index

        #Llama a los primeros 3 registros de la tabla pelicula por medio del modelo Pelicula y lo guarda en la variable peliculas
        // $peliculas = Pelicula::all()
        //                 ->take(3);

        $cartelerasEstreno = Cartelera::select('pelicula.titulo', 'pelicula.sinopsis', 'clasificacion.nombre as clasificacion', 'clasificacion.descripcion',
        'pelicula.duracion', 'pelicula.trailer', 'pelicula.portada')
        ->join('pelicula', 'cartelera.id_pelicula', '=', 'pelicula.id_pelicula')
        ->join('clasificacion', 'pelicula.id_clasificacion', '=', 'clasificacion.id_clasificacion')
        // ->where(function($queryWhere){
        //     $queryWhere->where('cartelera.id_tipo_cartelera', 1)
        //     ->orWhere('cartelera.id_estado', 1);
        // })
        ->where('cartelera.id_tipo_cartelera', 1)
        ->where('cartelera.id_estado', 1)
        ->distinct()
        ->orderBy('pelicula.titulo')
        ->take(3)
        ->get();

        $cartelerasPrestreno = Cartelera::select('pelicula.titulo', 'pelicula.sinopsis', 'clasificacion.nombre as clasificacion', 'clasificacion.descripcion',
        'pelicula.duracion', 'pelicula.trailer', 'pelicula.portada')
        ->join('pelicula', 'cartelera.id_pelicula', '=', 'pelicula.id_pelicula')
        ->join('clasificacion', 'pelicula.id_clasificacion', '=', 'clasificacion.id_clasificacion')
        ->where('cartelera.id_tipo_cartelera', 2)
        ->where('cartelera.id_estado', 1)
        ->take(3)
        ->get();

        $productos = Producto::select('tipo_producto.nombre_tipo', 'producto.nombre', 'producto.imagen')
        ->join('tipo_producto', 'producto.id_tipo_producto', '=', 'tipo_producto.id_tipo_producto')
        ->groupBy('producto.id_tipo_producto')
        ->take(3)
        ->get();
        
        // $productos = Producto::where('id_producto', 20)
        // ->orWhere('id_producto', 26)
        // ->orWhere('id_producto', 5)
        // ->get();

        //return $peliculas . $estado;

        #compact() - Envia todas las variables que se necesiten hacia la vista indicada
        return view('almacen.inicio.index', compact('productos', 'cartelerasEstreno', 'cartelerasPrestreno'));
    }

    public function show()
    {
        return view();
    }
}
