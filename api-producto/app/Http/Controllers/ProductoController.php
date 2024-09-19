<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return response()->json(['status' => 'success', 'data' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $productos = Producto::create($request->all());
            return response()->json(['status' => 'success', 'message' => 'Producto creado correctamente', 'data' => $productos]);
           
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        try{


            $productos = Producto::find($id);
            if($productos){
                return response()->json(['status' => 'success', 'data' => $productos]);
            }
            else{
                return response()->json(['status' => 'error', 'message' => 'Producto no encontrado']);
            }
        }
       
        catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try{

            $productos = Producto::find($id);
           
            $productos->update($request->all());
            return response()->json(['status' => 'success', 'message' => 'Estudiante actualizado correctamente', 'data' => $productos]);
        } 
        
        catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try{

            $productos = Producto::find($id);
            $productos->delete();
            return response()->json(['status' => 'success', 'message' => 'Estudiante eliminado correctamente']);
        } 
        
        catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
