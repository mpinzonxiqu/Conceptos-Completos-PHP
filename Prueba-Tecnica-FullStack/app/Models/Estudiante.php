<?php
// app/Models/Estudiante.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'genero', 'edad'];

    // Otros métodos de modelo, relaciones, etc.
}
