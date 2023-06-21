<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/models/Usuario.php';

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

$action = $_GET['action'];

//Funciones de validación

function test_input($data) {				// Limpieza del input
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function usuarioValido($user){			//Chequea al menos una mayúscula o una minúscula o un número y más de 8 caracteres
	if( (preg_match( '~[A-Z]~', $user) ||
		preg_match( '~[a-z]~', $user) ||
		preg_match( '~\d~', $user)) &&
		!preg_match('/\s/',$user) &&
		(strlen($user) > 7)){
		
		$UsuarioModel = new Usuario();		//Abre conexión para consultar si el nombre de usuario existe en BD
		if(!$UsuarioModel->buscarUsuario($user)){
			unset($UsuarioModel);
			return true;
		}else{
			unset($UsuarioModel);
			$_SESSION['erroruser'] = "Este usuario ya existe.<br>";
			return false;
		}
	} else {
		$_SESSION['erroruser'] = "Usuario inválido.<br>";
		return false;
	}
}

function contraValido($contrasena){			//Chequea al menos una mayúscula, una minúscula, un número y más de 8 caracteres
	if( preg_match( '~[A-Z]~', $contrasena) &&
		preg_match( '~[a-z]~', $contrasena) &&
		preg_match( '~\d~', $contrasena) &&
		!preg_match('/\s/',$contrasena) &&
		(strlen($contrasena) > 7)){
		return true;
	} else {
		$_SESSION['errorcontra'] = "La contraseña no cumple con los requisitos.<br>";
		return false;
	}
}

function nombreValido($nombre){				//Chequea que nombre sea solo letras y espacios	
	if (!preg_match('/^[\p{L} ]+$/u', $nombre)){
		$_SESSION['errornombre'] = "Nombre no cumple con los requisitos.<br>";
		return false;
	} else {
		return true;
	}
}

function imagenValido($imagen){
	if ($imagen!=""){
		$file_headers = @get_headers($imagen);
		if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
			$_SESSION['errorimagen'] = "URL inválido.<br>";
			return false;	//El url es inválido
		}
		else {
			//$exists = true;		//El url es válido, prosigue a chequear si es imagen
			$headers = get_headers($imagen, 1);
			if (strpos($headers['Content-Type'], 'image/') !== false) {
				echo "Es imagen<br>";

				//$image_url = 'https://www.pngarts.com/files/10/Default-Profile-Picture-PNG-Transparent-Image.png';
				$image_type_check = @exif_imagetype($imagen);//Get image type + check if exists
				if (strpos($http_response_header[0], "403") || strpos($http_response_header[0], "404") || strpos($http_response_header[0], "302") || strpos($http_response_header[0], "301")) {
					echo "403/404/302/301<br>";
					$_SESSION['errorimagen'] = "URL no es una imagen.<br>";
					return false;
				} else {
					echo "image exists<br>";
				}
				if ($image_type_check == IMAGETYPE_JPEG || $image_type_check == IMAGETYPE_PNG) {
					echo "Png o jpg<br>";
					return true;	//Devuelve true si es jpg o png
				}else{
					echo "No Png o jpg<br>";
					$_SESSION['errorimagen'] = "URL no es jpg o png.<br>";
					return false;	//Devuelve false si no es jpg o png
				}

			} else {
				echo "Not Image<br>";
				$_SESSION['errorimagen'] = "URL no es una imagen.<br>";
				return false;	//No es una imagen
			}
		}
	}else{
		return true;
	}
}

//Fin de funciones de validación




// ALTA DE USUARIO
if ($action === 'insertar'){
	//Obtiene datos del form
	$user = $_POST['user'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$imagen = $_POST['imagen'];
	
	//Setea imagen a string vacío si no tiene datos
	if (empty($imagen)){
		$imagen = "";
	}

	$user = test_input($user);
	$contrasena = test_input($contrasena);
	$nombre = test_input($nombre);
	$imagen = test_input($imagen);
	
	if(usuarioValido($user) && contraValido($contrasena) && nombreValido($nombre) && imagenValido($imagen)){
		//Crea un model para obtener los métodos
		$UsuarioModel = new Usuario();
		//Llama al método para el insert a la BD
		$UsuarioModel->altaUsuario($user, $contrasena, $nombre, $imagen);
		//Cierra la conexión
		unset($UsuarioModel);

		//Redirecciona al View de registro. ¿Cambiar por view de Login?
		require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/AltaUsuarioForm.php';
	}else{
		if (!empty($_SESSION['erroruser'])){
			echo $_SESSION['erroruser'];
			unset($_SESSION['erroruser']);
		}
		if (!empty($_SESSION['errorcontra'])){
			echo $_SESSION['errorcontra'];
			unset($_SESSION['errorcontra']);
		}
		if (!empty($_SESSION['errornombre'])){
			echo $_SESSION['errornombre'];
			unset($_SESSION['errornombre']);
		}
		if (!empty($_SESSION['errorimagen'])){
			echo $_SESSION['errorimagen'];
			unset($_SESSION['errorimagen']);
		}
		require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/AltaUsuarioForm.php';
	}
}



// VER PERFIL
if ($action === 'verperfil'){
	$user = 4; // $_SESSION['iduser'];
	
	//Crea un model para obtener los métodos
	$UsuarioModel = new Usuario();
	//Llama al método para el obtener los datos del usuario desde la BD
	$datos = $UsuarioModel->perfilUsuario($user);
	//Guarda datos en array
	/*$userData = array();
	foreach ($datos[0] as $val){
		echo $val;
		$userData = $val;
	}*/
	//Cierra la conexión
	unset($UsuarioModel);
	//Redirecciona al view con los datos del perfil
	require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/VerPerfil.php';
}


if ($action === 'editar'){
	$user = 4; // $_SESSION['iduser'];
	
	//Crea un model para obtener los métodos
	$UsuarioModel = new Usuario();
	//Llama al método para el obtener los datos del usuario desde la BD
	$datos = $UsuarioModel->editarUsuario($user);
	//Cierra la conexión
	unset($UsuarioModel);
	//Redirecciona al formulario para modificar los datos
	require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/EditarPerfil.php';
}

if ($action === 'confirmarEditar'){
	$user = 4; // $_SESSION['iduser'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$imagen = $_POST['imagen'];
	
	//Setea imagen a string vacío si no tiene datos
	if (empty($imagen)){
		$imagen = "";
	}

	$user = test_input($user);
	$contrasena = test_input($contrasena);
	$nombre = test_input($nombre);
	$imagen = test_input($imagen);

	if(contraValido($contrasena) && nombreValido($nombre) && imagenValido($imagen)){
		//Crea un model para obtener los métodos
		$UsuarioModel = new Usuario();
		//Llama al método para el insert a la BD
		$UsuarioModel->confirmarEditar($user, $contrasena, $nombre, $imagen);
		//Cierra la conexión
		unset($UsuarioModel);

		//Redirecciona al View de registro. ¿Cambiar por view de Login?
		require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/AltaUsuarioForm.php';
	}else{
		if (!empty($_SESSION['errorcontra']))
			echo $_SESSION['errorcontra'];
			unset($_SESSION['errorcontra']);
		if (!empty($_SESSION['errornombre']))
			echo $_SESSION['errornombre'];
			unset($_SESSION['errornombre']);
		if (!empty($_SESSION['errorimagen']))
			echo $_SESSION['errorimagen'];
			unset($_SESSION['errorimagen']);
		require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/AltaUsuarioForm.php';
	}
}


/*
--USUARIOS
	Validación de datos < Hecho >
	Nuevo Usuario < Hecho >
	View Usuario < Hecho >
	Edit Usuario < Hecho >
	Grilla Usuarios <En espera/Descartado>

*/
?>
