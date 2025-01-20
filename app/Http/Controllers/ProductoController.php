<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $producto = Producto::all();
        return view('producto.index', compact('producto'));
    }

    public function getData(Request $request)
    {
        $producto = Producto::all();
        return response()->json([
            'status' => '200',
            'message' => 'Listado de Productos',
            'result'=> $producto
        ]);
    }
    public function save(Request $request){

        $producto = Producto::create([
            'name'=> $request->name,
            'marca_id'=> $request->marca_id,
            'proveedor_id'=> $request->proveedor_id,
            'precio'=> $request->precio,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Producto creada',
        ]);
    }

    public function update(Request $request){

        $producto = Producto::findOrFail($request->id);
        $producto->update([
            'name'=> $request->name,
            'marca_id'=> $request->marca_id,
            'proveedor_id'=> $request->proveedor_id,
            'precio'=> $request->precio
            ]);
            }
        
    public function delete(Request $request){
        $producto = Producto::findOrFail($request->id);
        $producto->delete();
        return response()->json([
            'status'=> '200',
            'message'=> 'Producto eliminado correctamente',
            ]);
}
}