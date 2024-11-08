<?php

// app/Http/Controllers/GestionAlumnosController.php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class GestionAlumnosController extends Controller
{
    /**
     * Mostrar la lista de alumnos con filtros de género y edad.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Obtener los filtros de la solicitud
        $genero = $request->input('genero');
        $edad = $request->input('edad');

        // Crear la consulta base
        $query = Alumno::query();

        // Filtrar por género si es seleccionado
        if ($genero) {
            $query->where('genero', $genero);
        }

        // Filtrar por edad si es seleccionado
        if ($edad == '22') {
            // Menor o igual a 22 años
            $query->whereRaw('TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) <= 22');
        } elseif ($edad == '23') {
            // Mayor a 22 años
            $query->whereRaw('TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) > 22');
        }

        // Obtener los alumnos con paginación
        $alumnos = $query->paginate(10);

        // Retornar la vista con los alumnos filtrados
        return view('alumnos.index', compact('alumnos'));
    }

    // El resto de funciones como create, store, edit, update y destroy se mantienen igual
}
