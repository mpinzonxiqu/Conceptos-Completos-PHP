<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:alumnos',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index');
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'cedula' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}
