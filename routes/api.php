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
    Route::save('bodega/guardar','save');
    Route::put('bodega/actualizar','update');
    Route::delete('bodega/borrer','destroy');
});

//Rutas InventarioController

Route::controller(InventarioController::class)->group(function(){
    Route::get('inventario/datos','getData');
    Route::save('inventario/guardar','save');
    Route::put('inventario/actualizar','update');
    Route::delete('inventario/borrer','destroy');
});

//Rutas MarcaController

Route::controller(MarcaController::class)->group(function(){
    Route::get('marca/datos','getData');
    Route::save('marca/guardar','save');
    Route::put('marca/actualizar','update');
    Route::delete('marca/borrer','destroy');
});

//Rutas ProductoController

Route::controller(ProductoController::class)->group(function(){
    Route::get('producto/datos','getData');
    Route::save('producto/guardar','save');
    Route::put('producto/actualizar','update');
    Route::delete('producto/borrer','destroy');
});

//Rutas ProveedorController

Route::controller(BodegaController::class)->group(function(){
    Route::get('bodega/datos','getData');
    Route::save('bodega/guardar','save');
    Route::put('bodega/actualizar','update');
    Route::delete('bodega/borrer','destroy');
});