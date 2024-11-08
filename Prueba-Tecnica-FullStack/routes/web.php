<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\EstudianteController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumnos', AlumnoController::class);

Route::resource('examenes', ExamenController::class);
Route::get('/estudiantes', [EstudianteController::class, 'index']);