<?php

namespace App\Http\Controllers;

use App\Models\marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index()
    {
        $marca = marca::all();
        return view('marca.index', compact('marca'));
    }
    
    public function getData(Request $request)
    {
        $marca = marca::all();
        return response()->json([
            'status' => '200',
            'message' => 'Listado de marcas',
            'result'=> $marca
        ]);
    }
    public function save(Request $request){
        $marca = marca::create([
            'nombre' => $request->nombre,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'marca creada',
        ]);
    }

    public function update(Request $request){
        $marca = marca::findOrFail($request->id);
        $marca->update([
            'nombre' => $request->nombre,
        ]);
        
        return response()->json([
            'status' => '200',
            'message' => 'marca actualizada',
        ]);
    }
    public function destroy(Request $request){
        $marca = marca::findOrFail($request->id);
        $marca->delete();
        return response()->json([
            'status' => '200',
            'message' => 'marca eliminada',
        ]);
    }
}