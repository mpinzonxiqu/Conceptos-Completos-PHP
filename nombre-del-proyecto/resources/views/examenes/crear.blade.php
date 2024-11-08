<form action="{{ route('examenes.guardar') }}" method="POST">
    @csrf
    <label for="titulo">Título del Examen:</label>
    <input type="text" name="titulo" id="titulo" required>

    <label for="preguntas">Selecciona 3 Preguntas:</label>
    <select name="preguntas[]" id="preguntas" multiple required>
        @foreach ($preguntas as $pregunta)
            <option value="{{ $pregunta->id }}">{{ $pregunta->pregunta }}</option>
        @endforeach
    </select>

    <button type="submit">Crear Examen</button>
</form>

