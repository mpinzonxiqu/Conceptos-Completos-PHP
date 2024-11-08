<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula', 'nombre', 'apellido', 'direccion', 'genero', 'fecha_nacimiento',
    ];

    public function examenes()
    {
        return $this->belongsToMany(Examen::class, 'alumno_examen');
    }
}
