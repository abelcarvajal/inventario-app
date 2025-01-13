<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function getData(Request $request)
    {
        $proveedor = Proveedor::all();
        return response()->json([
            'status' => '200',
            'message' => 'Listado de proveedors',
            'result'=> $proveedor
        ]);
    }
    public function save(Request $request){
        $proveedor = Proveedor::create([
            'nombre' => $request->nombre,
            'direccon' => $request->direccion,
            'telefono'=> $request->telefono,
            'email'=> $request->email,
        ]);
        return response()->json([
            'status' => '200',
            'message' => 'proveedor creada',
        ]);
    }

    public function update(Request $request){
        $proveedor = Proveedor::findOrFail($request->id);
        $proveedor->update([
            'nombre' => $request->nombre,
            'direccon' => $request->direccion,
            'telefono'=> $request->telefono,
            'email'=> $request->email,

        ]);
        
        return response()->json([
            'status' => '200',
            'message' => 'proveedor actualizada',
        ]);
    }
    public function destroy(Request $request){
        $proveedor = Proveedor::findOrFail($request->id);
        $proveedor->delete();
        return response()->json([
            'status' => '200',
            'message' => 'proveedor eliminada',
        ]);
    }
}