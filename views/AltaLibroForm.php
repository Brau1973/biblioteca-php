<!DOCTYPE html>
<html>
<head>
    <title>Alta de Libro</title>
</head>
<body>
    <h1>Alta de Libro</h1>
    <form action="action=altaLibro" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
