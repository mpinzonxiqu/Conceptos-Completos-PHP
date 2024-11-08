<!-- resources/views/examenes/assign.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Asignar Examen: {{ $examen->titulo }}</h1>

    <form action="{{ route('examenes.assignToAlumno', $examen) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="alumno_id">Seleccionar Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-control" required>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->id }}">{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Asignar Examen</button>
    </form>
@endsection
