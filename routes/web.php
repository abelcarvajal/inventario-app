<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bodega', [BodegaController::class, 'index']);

Route::get('/bodega/{id}/edit', [BodegaController::class, 'edit'])->name('bodega.edit'); // Ruta de edición
Route::put('/bodega/{id}', [BodegaController::class, 'update'])->name('bodega.update'); // Ruta de actualización
Route::get('/inventario', [InventarioController::class, 'index']);

Route::get('/marca', [MarcaController::class, 'index']);

Route::get('/producto', [ProductoController::class, 'index']);

Route::get('/proveedor', [ProveedorController::class, 'index']);
