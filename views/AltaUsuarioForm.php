<!DOCTYPE html>
<html>
<head>
    <title>Alta de Usuario</title>
</head>
<body>
    <h1>Alta de Usuario</h1>
    <form action="../controllers/UsuarioController.php?action=insertar" method="POST">
        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" required><br>
        <label for="contrasena">Contraseña:</label>
        <input type="text" id="contrasena" name="contrasena" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="imagen">Imagen de Perfil*:</label>
        <input type="text" id="imagen" name="imagen"><br>
		<label><i>*Opcional, link a imagen en formato jpg o png.</i></label><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
