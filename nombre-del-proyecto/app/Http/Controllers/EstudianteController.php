<?php

namespace App\Http\Controllers;

use App\Models\Estudiante; // Usamos el modelo Estudiante en lugar de Alumno
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Método para mostrar la lista de estudiantes con filtros
    public function index(Request $request)
    {
        // Obtener los filtros de la solicitud (si existen)
        $genero = $request->input('genero');
        $edad = $request->input('edad');

        // Consultar estudiantes con filtros
        $estudiantes = Estudiante::query(); // Usamos el modelo Estudiante en lugar de Alumno

        // Filtrar por género si se especifica
        if ($genero) {
            $estudiantes->where('genero', $genero);
        }

        // Filtrar por edad si se especifica
        if ($edad) {
            if ($edad == 'menor') {
                $estudiantes->where('edad', '<=', 22);
            } elseif ($edad == 'mayor') {
                $estudiantes->where('edad', '>', 22);
            }
        }

        // Obtener los estudiantes filtrados
        $estudiantes = $estudiantes->get();

        // Pasar los datos a la vista
        return view('estudiantes.lista', compact('estudiantes'));
    }
}
