<!-- resources/views/alumnos/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Alumno</h1>

    <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="cedula">Cédula</label>
            <input type="text" name="cedula" id="cedula" class="form-control" value="{{ old('cedula', $alumno->cedula) }}" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $alumno->apellido) }}" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion', $alumno->direccion) }}" required>
        </div>

        <div class="form-group">
            <label for="genero">Género</label>
            <select name="genero" id="genero" class="form-control" required>
                <option value="Masculino" {{ $alumno->genero == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $alumno->genero == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ $alumno->genero == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Actualizar Alumno</button>
    </form>
@endsection
