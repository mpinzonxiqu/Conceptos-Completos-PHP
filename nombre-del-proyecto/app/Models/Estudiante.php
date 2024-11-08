<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos (si es diferente al plural del modelo)
    protected $table = 'estudiantes';

    // Asegúrate de que estos campos estén en tu tabla 'estudiantes'
    protected $fillable = ['nombre', 'genero', 'edad'];
}