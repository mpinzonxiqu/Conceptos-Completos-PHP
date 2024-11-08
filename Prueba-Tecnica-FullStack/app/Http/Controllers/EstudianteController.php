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

        $genero = $request->input('genero');
        $edad = $request->input('edad');

       
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

        
        $estudiantes = $estudiantes->get();

     
        return view('estudiantes.index', compact('estudiantes'));
    }
}
