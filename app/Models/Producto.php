<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca_id',
        'proveedor_id',
        'precio',
    ];
    public function marca(){
        return $this->belongsTo(Marca::class);
    }
    public function proveedorr(){
        return $this->belongsTo(Proveedor::class);
    }
}