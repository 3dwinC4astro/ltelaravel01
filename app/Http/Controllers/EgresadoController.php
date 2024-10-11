<?php

namespace App\Http\Controllers;

use App\Models\Egresado;
use Illuminate\Http\Request;

class EgresadoController extends Controller
{
    public function index()
    {
        $egresados = Egresado::all();
        return view('egresados.index', compact('egresados'));
    }

    public function create()
    {
        return view('egresados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:egresados',
            'nombres' => 'required',
            'apellidos' => 'required',
            'programa' => 'required',
            'celular' => 'required',
            'correo' => 'required|unique:egresados',
            'fecha_nacimiento' => 'required|date',
            'fecha_grado' => 'required|date', // Campo adicional
        ]);

        Egresado::create($request->all());
        return redirect()->route('egresados.index')->with('success', 'Egresado agregado con éxito');
    }

    public function edit(Egresado $egresado)
    {
        return view('egresados.edit', compact('egresado'));
    }

    public function update(Request $request, Egresado $egresado)
    {
        $request->validate([
            'cedula' => 'required|unique:egresados,cedula,' . $egresado->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'programa' => 'required',
            'celular' => 'required',
            'correo' => 'required|unique:egresados,correo,' . $egresado->id,
            'fecha_nacimiento' => 'required|date',
            'fecha_grado' => 'required|date', // Campo adicional
        ]);

        $egresado->update($request->all());
        return redirect()->route('egresados.index')->with('success', 'Egresado actualizado con éxito');
    }

    public function destroy(Egresado $egresado)
    {
        $egresado->delete();
        return redirect()->route('egresados.index')->with('success', 'Egresado eliminado con éxito');
    }
}
