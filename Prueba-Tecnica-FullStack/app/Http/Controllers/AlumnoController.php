<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula' => 'required|unique:alumnos',
            'nombres' => 'required',
            'apellidos' => 'required',
            'direccion_residencia' => 'required',
            'genero' => 'required',
            'fecha_nacimiento' => 'required|date',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index');
    }

    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }
}
