<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\MarcaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rutas BodegaController
Route::controller(BodegaController::class)->group(function(){
    Route::get('bodega/datos','getData');
    Route::post('bodega/guardar','save'); 
    Route::put('bodega/actualizar/{id}','update');
    Route::delete('bodega/borrar/{id}','destroy');
});

//Rutas InventarioController
Route::controller(InventarioController::class)->group(function(){
    Route::get('inventario/datos','getData');
    Route::post('inventario/guardar','save'); // Cambiado a post
    Route::put('inventario/actualizar','update');
    Route::delete('inventario/borrar','destroy');
});

//Rutas MarcaController
Route::controller(MarcaController::class)->group(function(){
    Route::get('marca/datos','getData');
    Route::post('marca/guardar','save'); // Cambiado a post
    Route::put('marca/actualizar','update');
    Route::delete('marca/borrar','destroy');
});

//Rutas ProductoController
Route::controller(ProductoController::class)->group(function(){
    Route::get('producto/datos','getData');
    Route::post('producto/guardar','save'); // Cambiado a post
    Route::put('producto/actualizar','update');
    Route::delete('producto/borrar','destroy');
});

//Rutas ProveedorController
Route::controller(ProveedorController::class)->group(function(){
    Route::get('proveedor/datos','getData');
    Route::post('proveedor/guardar','save'); // Cambiado a post
    Route::put('proveedor/actualizar','update');
    Route::delete('proveedor/borrar','destroy');
});
