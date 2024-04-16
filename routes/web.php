<?php

use App\Http\Controllers\CarteleraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\DescripcionCarteleraController;
use App\Models\Cartelera;
use Illuminate\Routing\ViewController;

//Esta ruta se encarga de mostrar la página principal del sitio web
Route::get('/',[HomeController::class, 'index'])->name('index');

//->name('nombre_de_la_ruta') Sirve para dar un alias a una ruta y una forma de llamarla desde las vistas.
//Esta ruta se encarga de mostrar la vista de la tienda.
Route::get('/tienda',[TiendaController::class, 'index'])->name('tienda');

//Esta ruta se encarga de mostrar la vista de la cartelera completa del cine
Route::get('/cartelera', [CarteleraController::class, 'index'])->name('cartelera');

//Esta ruta se encarga de mostrar la vista de la cartelera seleccionada en la cartelera completa (la ruta anterior)
Route::get('/descripcion/{id}', [DescripcionCarteleraController::class, 'index'])->name('descripcionCartelera');

Route::post('/tienda/store', [TiendaController::class, 'store'])->name('ejemplo');

//Esta ruta no se encarga de nada aún
Route::get('/peliculas', []);