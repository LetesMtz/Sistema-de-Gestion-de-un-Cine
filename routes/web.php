<?php

use App\Http\Controllers\CarteleraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\DescripcionCarteleraController;
use App\Http\Controllers\PagarController;
use App\Models\Cartelera;
use Illuminate\Routing\ViewController;

/* Acciones del controlador HomeController */

//Esta ruta se encarga de mostrar la página principal del sitio web
Route::get('/',[HomeController::class, 'index'])->name('index');

/* Acciones del controlador CarteleraController */

//Esta ruta se encarga de mostrar la vista de la cartelera completa del cine
Route::get('/cartelera', [CarteleraController::class, 'index'])->name('cartelera');

//Esta ruta se encarga de mostrar la vista de la cartelera seleccionada en la cartelera completa (la ruta anterior)
Route::get('/descripcion/{id}', [DescripcionCarteleraController::class, 'index'])->name('descripcionCartelera');

/* Acciones del controlador pagar */
Route::get('/pagar/{id}', [PagarController::class, 'index'])->name('aPagarGet');

Route::post('/pagar/{id}', [PagarController::class, 'index'])->name('aPagar');

Route::post('/pagar/{id}/agregarboleto', [PagarController::class, 'AgregarBoleto'])->name('agregarBoleto');

Route::post('/pagado/agregarventa', [PagarController::class, 'AgregarVenta'])->name('agregarVenta');

/* Acciones del controlador TiendaController */

//->name('nombre_de_la_ruta') Sirve para dar un alias a una ruta y una forma de llamarla desde las vistas.
//Esta ruta se encarga de mostrar la vista de la tienda.
Route::get('/tienda',[TiendaController::class, 'index'])->name('tienda');

Route::post('/tienda/store', [TiendaController::class, 'store'])->name('carritoCompras');

Route::get('/tienda/update/{id}', [TiendaController::class, 'update'])->name('editarItemCarrito');

Route::get('/tienda/delete/{id}', [TiendaController::class, 'destroy'])->name('eliminarItemCarrito');

//Esta ruta no se encarga de nada aún
Route::get('/peliculas', []);