<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Punto;

class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $puntos=Punto::all();
        //Renderizar la visat y pasan datos
        return view('puntos.index',compact('puntos'));
    }

    public function mapa()
    {
        //Consulta de clientes en la bbd
        $puntos=Punto::all();
        //Renderizar la visat y pasan datos
        return view('puntos.mapa',compact('puntos'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('puntos.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $datos = [
            'nombre'=> $request->nombre,
            'capacidad'=> $request->capacidad,
            'responsable'=> $request->responsable,
            'latitud'=> $request->latitud,
            'longitud'=> $request->longitud,
        ];
        Punto::create($datos);
        return redirect()->route('puntos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $punto = Punto::findOrFail($id);
        return view('puntos.editar', compact('punto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $punto = Punto::findOrFail($id);
        $punto->update([
        'nombre'=> $request->nombre,
        'capacidad'=> $request->capacidad,
        'responsable'=> $request->responsable,
        'latitud'=> $request->latitud,
        'longitud'=> $request->longitud,
        ]);

        return redirect()->route('puntos.index')->with('success', 'Punto de Encuentro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $punto = Punto::findOrFail($id);
        $punto->delete();

        return redirect()->route('Puntos.index')->with('success', 'Punto de Encuentro eliminado correctamente');
    }
}
