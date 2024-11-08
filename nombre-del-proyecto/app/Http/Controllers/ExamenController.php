<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function create()
    {
        $preguntas = Pregunta::all();
        return view('examenes.create', compact('preguntas'));
    }

    public function store(Request $request)
    {
        $examen = Examen::create([
            'titulo' => $request->titulo,
            'profesor_id' => auth()->id(),
        ]);

        $examen->preguntas()->attach($request->preguntas); // Relacionar preguntas con el examen

        return redirect()->route('examenes.index');
    }

    public function assign(Examen $examen)
    {
        $alumnos = Alumno::all();
        return view('examenes.assign', compact('examen', 'alumnos'));
    }

    public function assignToAlumno(Request $request, Examen $examen)
    {
        $examen->alumnos()->attach($request->alumno_id);
        return redirect()->route('examenes.index');
    }
}

