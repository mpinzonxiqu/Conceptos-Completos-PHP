<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'profesor_id'];

    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class, 'pregunta_examen');
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_examen');
    }
}
