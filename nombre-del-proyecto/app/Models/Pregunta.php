<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = ['pregunta', 'respuesta_correcta', 'opciones'];

    protected $casts = [
        'opciones' => 'array', // Convertir las opciones a un array JSON
    ];
}
