<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('proveedor_id');
            $table->unsignedBigInteger('bodega_id');
            $table->integer('stock');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
