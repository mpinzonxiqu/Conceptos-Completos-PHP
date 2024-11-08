<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function create()
    {
        return view('examenes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_programada' => 'required|date',
        ]);

        $examen = Examen::create($request->all());

        // Asignar el examen a los alumnos seleccionados
        if ($request->has('alumnos')) {
            $examen->alumnos()->attach($request->alumnos);
        }

        return redirect()->route('examenes.index');
    }

    public function index()
    {
        $examenes = Examen::all();
        return view('examenes.index', compact('examenes'));
    }
}
