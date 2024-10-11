<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;
use Illuminate\Http\Request;

class AspiranteController extends Controller
{
    public function index()
    {
        $aspirantes = Aspirante::all();
        return view('aspirantes.index', compact('aspirantes'));
    }

    public function create()
    {
        return view('aspirantes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:aspirantes',
            'nombres' => 'required',
            'apellidos' => 'required',
            'programa' => 'required',
            'celular' => 'required',
            'correo' => 'required|unique:aspirantes',
            'fecha_nacimiento' => 'required|date',
        ]);

        Aspirante::create($request->all());
        return redirect()->route('aspirantes.index');
    }

    public function edit(Aspirante $aspirante)
    {
        return view('aspirantes.edit', compact('aspirante'));
    }

    public function update(Request $request, Aspirante $aspirante)
    {
        $request->validate([
            'cedula' => 'required|unique:aspirantes,cedula,' . $aspirante->id,
            'nombres' => 'required',
            'apellidos' => 'required',
            'programa' => 'required',
            'celular' => 'required',
            'correo' => 'required|unique:aspirantes,correo,' . $aspirante->id,
            'fecha_nacimiento' => 'required|date',
        ]);

        $aspirante->update($request->all());
        return redirect()->route('aspirantes.index');
    }

    public function destroy(Aspirante $aspirante)
    {
        $aspirante->delete();
        return redirect()->route('aspirantes.index');
    }
}
