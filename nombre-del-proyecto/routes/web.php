<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ExamenController;
use App\Models\Alumno;
use App\Models\Examen;
use App\Http\Controllers\EstudianteController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hola', function () {
    return 'Hola Mundo';
});



// Rutas para alumnos
Route::resource('alumnos', AlumnoController::class);

// Rutas para exámenes
Route::resource('examenes', ExamenController::class);

Route::get('/examenes', [ExamenController::class, 'index'])->name('Examenes.assign');

// Asignar exámenes a los alumnos
Route::get('examenes/{examen}/assign', [ExamenController::class, 'assign'])->name('examenes.assign');

Route::post('examenes/{examen}/assign', [ExamenController::class, 'assignToAlumno'])->name('examenes.assignToAlumno');





Route::get('estudiantes', [EstudianteController::class, 'lista'])->name('estudiantes.lista');