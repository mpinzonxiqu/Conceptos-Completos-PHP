<form action="{{ route('examenes.guardar_asignacion', $examen) }}" method="POST">
    @csrf
    <label for="alumnos">Selecciona los Alumnos:</label>
    <select name="alumnos[]" id="alumnos" multiple required>
        @foreach ($alumnos as $alumno)
            <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
        @endforeach
    </select>

    <button type="submit">Asignar Examen</button>
</form>
