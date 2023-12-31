<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //dd($request->all());

        $request->validate([
           'nombres' => 'required',
           'apellidos' => 'required',
           'correo' => 'required',
           'contrasenia' => 'required'
        ]);

        $cliente = new Cliente;
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->correo = $request->correo;
        $cliente->contrasenia = $request->contrasenia;

        $cliente->save();

        return $cliente;
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        
        return $cliente;
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required',
            'contrasenia' => 'required'
         ]);
 
         
         $cliente->nombres = $request->nombres;
         $cliente->apellidos = $request->apellidos;
         $cliente->correo = $request->correo;
         $cliente->contrasenia = $request->contrasenia;
 
         $cliente->update();
 
         return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente)){

            return response()->json('Cliente no encontrado, No se pudo hacer la operacion',404);

        }
        
        $cliente->delete();
        return response()->noContent();
    }
}
