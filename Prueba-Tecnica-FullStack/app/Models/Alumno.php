<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'direccion_residencia',
        'genero',
        'fecha_nacimiento',
    ];

    // Relación con los exámenes
    public function examenes()
    {
        return $this->belongsToMany(Examen::class);
    }
}
