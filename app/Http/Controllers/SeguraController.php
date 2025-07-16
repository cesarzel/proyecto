<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segura;

class SeguraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seguras = Segura::all();
        return view('seguras.index', compact('seguras'));
    }


    public function mapa()
    {
        $seguras = Segura::all();
        return view('seguras.mapa', compact('seguras'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seguras.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = [
            'nombre'      => $request->nombre,
            'responsable' => $request->responsable,
            'tipo'        => $request->tipo,
            'radio'       => $request->radio,
            'latitud'     => $request->latitud,
            'longitud'    => $request->longitud,
        ];

        Segura::create($datos);

        return redirect()->route('seguras.index')->with('success', 'Zona segura registrada correctamente');
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
        $segura = Segura::findOrFail($id);
        return view('seguras.editar', compact('segura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $segura = Segura::findOrFail($id);
        $segura->update([
            'nombre'      => $request->nombre,
            'responsable' => $request->responsable,
            'tipo'        => $request->tipo,
            'radio'       => $request->radio,
            'latitud'     => $request->latitud,
            'longitud'    => $request->longitud,
        ]);

        return redirect()->route('seguras.index')->with('success', 'Zona segura actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $segura = Segura::findOrFail($id);
        $segura->delete();

        return redirect()->route('seguras.index')->with('success', 'Zona segura eliminada correctamente');
    }
}
