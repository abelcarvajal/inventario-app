<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventario = Inventario::all();
        return view('inventario.index', compact('inventario'));
    }

    public function show($id){
        $inventario = Inventario::with('producto','bodega','stock')->findOrFail($id);
        return response()->json($inventario);
    }
    public function getData(Request $request)
    {
        $inventario = Inventario::all();
        return response()->json([
            'status' => '200',
            'message' => 'Listado de inventarios',
            'result'=> $inventario
        ]);
    }

    public function save(Request $request){
        $inventario = Inventario::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'iIventario creado',
        ]);
    }

    public function update(Request $request){
        $inventario = Inventario::findOrFail($request->id);
        $inventario->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);
        
        return response()->json([
            'status' => '200',
            'message' => 'Inventario actualizada',
        ]);
    }
    public function destroy(Request $request){
        $inventario = inventario::findOrFail($request->id);
        $inventario->delete();
        return response()->json([
            'status' => '200',
            'message' => 'Inventario eliminada',
        ]);
    }
}