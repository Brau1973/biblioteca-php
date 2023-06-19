<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Modificar Datos:</h1>
    <form action="../controllers/UsuarioController.php?action=confirmarEditar" method="POST">
        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" value="<?php echo $datos[0]["Usuario"]; ?>" disabled><br>
        <label for="contrasena">Contraseña:</label>
        <input type="text" id="contrasena" name="contrasena" value="<?php echo $datos[0]["Contrasena"]; ?>" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $datos[0]["Nombre"]; ?>" required><br>
        <label for="imagen">Imagen de Perfil*:</label>
        <input type="text" id="imagen" name="imagen" value="<?php echo $datos[0]["Imagen"]; ?>"><br>
		<label><i>*Opcional, link a imagen en formato jpg o png.</i></label><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>