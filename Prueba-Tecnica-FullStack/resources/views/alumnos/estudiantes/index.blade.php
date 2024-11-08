<!-- resources/views/estudiantes/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
</head>
<body>
    <h1>Estudiantes</h1>

    <!-- Formulario de Filtros -->
    <form action="{{ url('/estudiantes') }}" method="GET">
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <option value="">--Seleccionar--</option>
            <option value="Masculino" {{ request('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="Femenino" {{ request('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </select>

        <label for="edad">Edad:</label>
        <select name="edad" id="edad">
            <option value="">--Seleccionar--</option>
            <option value="menor_22" {{ request('edad') == 'menor_22' ? 'selected' : '' }}>Menor o igual a 22 años</option>
            <option value="mayor_22" {{ request('edad') == 'mayor_22' ? 'selected' : '' }}>Mayor a 22 años</option>
        </select>

        <button type="submit">Filtrar</button>
    </form>

    <!-- Tabla de Estudiantes Filtrados -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Género</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->genero }}</td>
                    <td>{{ $estudiante->edad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
