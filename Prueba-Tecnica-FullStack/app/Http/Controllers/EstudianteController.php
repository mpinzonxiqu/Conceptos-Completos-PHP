<?php

// app/Http/Controllers/EstudianteController.php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Método para mostrar los estudiantes con filtros
    public function index(Request $request)
    {
        // Obtención de los filtros de la solicitud (si existen)
        $genero = $request->input('genero');
        $edad = $request->input('edad');

        // Consultamos los estudiantes aplicando filtros según los valores proporcionados
        $estudiantes = Estudiante::query();

        // Filtro por género
        if ($genero) {
            $estudiantes->where('genero', $genero);
        }

        // Filtro por edad
        if ($edad) {
            if ($edad == 'menor_22') {
                $estudiantes->where('edad', '<=', 22);
            } elseif ($edad == 'mayor_22') {
                $estudiantes->where('edad', '>', 22);
            }
        }

        // Obtener los resultados filtrados
        $estudiantes = $estudiantes->get();

        // Devolver la vista con los resultados
        return view('estudiantes.index', compact('estudiantes'));
    }
}
