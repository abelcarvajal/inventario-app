<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventario extends Model
{
    use HasFactory;
    protected $table = 'inventario';
    protected $fillable = [
        'producto_id',
        'bodega_id',
        'cantidad',
    ];

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    public function Bodega(){
        return $this->belongsTo(Bodega::class);
        }
}