<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pelicula;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PeliculaFormRequest;
#use DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return 'Hola';
    }

    public function create()
    {
        return view("almacen.pelicula.create");
    }

    public function store(PeliculaFormRequest $request)
    {
        #Almacena el modelo en la bd
        $pelicula=new Pelicula;
        $pelicula->id_estado='1';
        $pelicula->id_clasificacion=$request->get('id_clasificacion');
        $pelicula->titulo=$request->get('titulo');
        $pelicula->sinopsis=$request->get('sinopsis');
        $pelicula->duracion=$request->get('duracion');
        $pelicula->genero=$request->get('genero');
        $pelicula->portada=$request->get('portada');
        $pelicula->trailer=$request->get('trailer');
        $pelicula->save();
        return Redirect::to('almacen/pelicula');
    }

    public function show($id)
    {
        return view("almacen.pelicula.show", ["pelicula"=>Pelicula::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.pelicula.edit", ["pelicula"=>Pelicula::findOrFail($id)]);
    }

    public function update(PeliculaFormRequest $request, $id)
    {
        $pelicula=Pelicula::findOrFail($id);
        $pelicula->id_estado=$request->get('id_estado');;
        $pelicula->id_clasificacion=$request->get('id_clasificacion');
        $pelicula->titulo=$request->get('titulo');
        $pelicula->sinopsis=$request->get('sinopsis');
        $pelicula->duracion=$request->get('duracion');
        $pelicula->genero=$request->get('genero');
        $pelicula->portada=$request->get('portada');
        $pelicula->trailer=$request->get('trailer');
        $pelicula->update();
        return Redirect::to('almcen/pelicula');
    }

    public function destroy($id)
    {
        $pelicula=Pelicula::findOrFind($id);
        $pelicula->id_estado='0';
        $pelicula->update();
        return Redirect::to('almacen/pelicula');
    }
}
