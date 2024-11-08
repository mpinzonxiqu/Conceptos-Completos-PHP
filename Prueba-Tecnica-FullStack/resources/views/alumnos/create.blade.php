<form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <input type="text" name="cedula" placeholder="Cédula" required>
    <input type="text" name="nombres" placeholder="Nombres" required>
    <input type="text" name="apellidos" placeholder="Apellidos" required>
    <input type="text" name="direccion_residencia" placeholder="Dirección de Residencia" required>
    <select name="genero">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>
    <input type="date" name="fecha_nacimiento" required>
    <button type="submit">Registrar Alumno</button>
</form>
