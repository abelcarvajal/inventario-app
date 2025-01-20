<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodega.index', compact('bodegas'));
    }
    public function getData(Request $request)
    {
        $bodega = Bodega::all();
        return response()->json([
            'status' => '200',
            'message' => 'Listado de Bodegas',
            'result'=> $bodega
        ]);
    }
    public function save(Request $request){
        $bodega = Bodega::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'Bodega creada',
        ]);
    }

    public function update(Request $request){
        $bodega = Bodega::findOrFail($request->id);
        $bodega->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
        ]);
        
        return response()->json([
            'status' => '200',
            'message' => 'Bodega actualizada',
        ]);
    }
    public function destroy(Request $request){
        $bodega = Bodega::findOrFail($request->id);
        $bodega->delete();
        return response()->json([
            'status' => '200',
            'message' => 'Bodega eliminada',
        ]);
    }
}