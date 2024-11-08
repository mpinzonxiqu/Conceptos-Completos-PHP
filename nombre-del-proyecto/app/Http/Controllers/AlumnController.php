<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnController extends Controller
{
    // Método para mostrar la lista de alumnos con filtros
    public function index(Request $request)
    {
        // Obtener los filtros de la solicitud (si existen)
        $genero = $request->input('genero');
        $edad = $request->input('edad');

        // Consultar alumnos con filtros
        $alumnos = Alumno::query();

        // Filtrar por género si se especifica
        if ($genero) {
            $alumnos->where('genero', $genero);
        }

        // Filtrar por edad si se especifica
        if ($edad) {
            if ($edad == 'menor') {
                $alumnos->where('edad', '<=', 22);
            } elseif ($edad == 'mayor') {
                $alumnos->where('edad', '>', 22);
            }
        }

        // Obtener los alumnos filtrados
        $alumnos = $alumnos->get();

        // Pasar los datos a la vista
        return view('alumnos.index', compact('alumnos'));
    }
}
