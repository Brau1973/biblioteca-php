<!DOCTYPE html>
<html>
<head>
    <title>Alta de Usuario</title>
</head>
<body>
    <h1>Alta de Usuario</h1>
    <form action="../controllers/UsuarioController.php?action=insertar" method="POST">
        <label for="user">Usuario*</label><br>
        <input type="text" id="user" name="user" required><br>
        <label for="contrasena">Contraseña**</label><br>
        <input type="text" id="contrasena" name="contrasena" required><br>
        <label for="nombre">Nombre***</label><br>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="imagen">Imagen de Perfil****</label><br>
        <input type="text" id="imagen" name="imagen"><br><br>
		<label><i>*Obligatorio, mínimo de 8 caracteres, mayúscula, minúscula o número.</i></label><br>
		<label><i>**Obligatorio, mínimo de 8 caracteres, con una mayúscula, minúscula y número.</i></label><br>
		<label><i>***Obligatorio, solo letras y espacios.</i></label><br>
		<label><i>****Opcional, link a imagen en formato jpg o png.</i></label><br><br>
        <input type="submit" value="Guardar">
    </form>

    <h1>Ver Usuario</h1>
    <form action="../controllers/UsuarioController.php?action=verperfil" method="POST">
        <input type="submit" value="Ver">
    </form>
    <br><br>
    <?php
        /*function is_url_image($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url );
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_NOBODY, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            $headers = array();
            foreach(explode("\n",$output) as $line){
                $parts = explode(':' ,$line);
                if(count($parts) == 2){
                    $headers[trim($parts[0])] = trim($parts[1]);
                }

            }

            return isset($headers["Content-Type"]) && strpos($headers['Content-Type'], 'image/') === 0;
        }
        $return = is_url_image($image_url);
        echo "eco".$return."<br>";*/
        
        
        
        
        


    ?>
</body>
</html>
