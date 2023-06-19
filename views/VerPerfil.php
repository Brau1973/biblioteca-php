<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Usuario</title>
</head>
<body>
    <h1>Perfil de Usuario:</h1>
    <p><strong>Usuario:</strong> <?php echo $datos[0]["Usuario"]; ?></p>
    <p><strong>Nombre:</strong> <?php echo $datos[0]["Nombre"]; ?></p>
    <p><strong>Imagen:</strong> <?php echo $datos[0]["Imagen"]; ?></p>
    <form action="../controllers/UsuarioController.php?action=editar" method="POST">
        <input type="submit" value="Modificar">
    </form>
</body>
</html>