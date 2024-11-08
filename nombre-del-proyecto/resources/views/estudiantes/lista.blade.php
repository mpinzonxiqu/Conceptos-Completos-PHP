{{-- resources/views/estudiantes/lista.blade.php --}}

@extends('layouts.app') {{-- Usamos una plantilla base de la app (si existe) --}}

@section('content')
    <div class="container">
        <h1>Lista de Estudiantes</h1>

        {{-- Filtros --}}
        <form action="{{ route('estudiantes.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <label for="genero">Género:</label>
                    <select name="genero" id="genero" class="form-control">
                        <option value="">Seleccionar Género</option>
                        <option value="Masculino" {{ request('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="Femenino" {{ request('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="edad">Edad:</label>
                    <select name="edad" id="edad" class="form-control">
                        <option value="">Seleccionar Edad</option>
                        <option value="menor" {{ request('edad') == 'menor' ? 'selected' : '' }}>&#60;= 22 años</option>
                        <option value="mayor" {{ request('edad') == 'mayor' ? 'selected' : '' }}> &#62; 22 años</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Aplicar Filtros</button>
                </div>
            </div>
        </form>

        {{-- Tabla de Estudiantes --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Género</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->genero }}</td>
                        <td>{{ $estudiante->edad }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay estudiantes que coincidan con los filtros.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
