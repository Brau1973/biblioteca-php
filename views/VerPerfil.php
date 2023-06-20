<?PHP print_r($datos);?>
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
    <!-- Otros campos del perfil... -->
</body>
</html>