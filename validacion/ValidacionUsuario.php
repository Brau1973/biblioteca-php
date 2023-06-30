<?PHP

require_once "models/Usuario.php";

class ValidacionUsuario{

    public function test_input($data) {				// Limpieza del input
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    public function usuarioValido($user){			//Chequea al menos una mayúscula o una minúscula o un número y más de 8 caracteres
        if( (preg_match( '~[A-Z]~', $user) ||
            preg_match( '~[a-z]~', $user) ||
            preg_match( '~\d~', $user)) &&
            !preg_match('/\s/',$user) &&
            (strlen($user) > 7)){
            
            $UsuarioModel = new Usuario();		//Abre conexión para consultar si el nombre de usuario existe en BD
            if(!$UsuarioModel->ValidacionUser($user)){
                unset($UsuarioModel);
                return true;
            }else{
                unset($UsuarioModel);
                $_SESSION['erroruser'] = "Este usuario ya existe.";
                return false;
            }
        } else {
            $_SESSION['erroruser'] = "Usuario no cumple con los requisitos.";
            return false;
        }
    }
    
    public function contraValido($contrasena){			//Chequea al menos una mayúscula, una minúscula, un número y más de 8 caracteres
        if( preg_match( '~[A-Z]~', $contrasena) &&
            preg_match( '~[a-z]~', $contrasena) &&
            preg_match( '~\d~', $contrasena) &&
            !preg_match('/\s/',$contrasena) &&
            (strlen($contrasena) > 7)){
            return true;
        } else {
            $_SESSION['errorcontra'] = "La contraseña no cumple con los requisitos.";
            return false;
        }
    }
    
    public function nombreValido($nombre){				//Chequea que nombre sea solo letras y espacios	
        if (!preg_match('/^[\p{L} ]+$/u', $nombre)){
            $_SESSION['errornombre'] = "Nombre no cumple con los requisitos.";
            return false;
        } else {
            return true;
        }
    }
    
    public function imagenValido($imagen){
        if ($imagen!=""){
            $file_headers = @get_headers($imagen);
            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                $_SESSION['errorimagen'] = "URL inválido.";
                return false;	//El url es inválido
            }
            else {
                //$exists = true;		//El url es válido, prosigue a chequear si es imagen
                $headers = get_headers($imagen, 1);
                if (strpos($headers['Content-Type'], 'image/') !== false) {
                    $image_type_check = @exif_imagetype($imagen);//Get image type + check if exists
                    if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
                        $_SESSION['errorimagen'] = "URL no es una imagen.";
                        return false;
                    }
                    if ($image_type_check == IMAGETYPE_JPEG || $image_type_check == IMAGETYPE_PNG) {
                        return true;	//Devuelve true si es jpg o png
                    }else{
                        $_SESSION['errorimagen'] = "URL no es jpg o png.";
                        return false;	//Devuelve false si no es jpg o png
                    }
    
                } else {
                    $_SESSION['errorimagen'] = "URL no es una imagen.";
                    return false;	//No es una imagen
                }
            }
        }else{
            return true;
        }
    }

}

?>