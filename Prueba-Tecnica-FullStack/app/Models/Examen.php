<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_programada',
        'descripcion',
    ];

    // Relación con los alumnos
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class);
    }
}
