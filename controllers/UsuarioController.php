<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/models/Usuario.php';

$action = $_GET['action'];

if(session_status() !== PHP_SESSION_ACTIVE) session_start();


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
	
	//Chequeo innecesario por el momento dado que son required en el form
	if (empty($user) || empty($contrasena) || empty($nombre)) {
		echo "El usuario, contraseña y nombre son campos requeridos.";
		return;
	}

	//Crea un model para obtener los métodos
	$UsuarioModel = new Usuario();
	//Llama al método para el insert a la BD
	$UsuarioModel->altaUsuario($user, $contrasena, $nombre, $imagen);
	//Cierra la conexión
	unset($UsuarioModel);

	//Redirecciona al View de registro. ¿Cambiar por view de Login?
	require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/AltaUsuarioForm.php';
}



// VER PERFIL
if ($action === 'verperfil'){
	$user = 1; // $_SESSION['iduser'];
	
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
	$user = 1; // $_SESSION['iduser'];
	
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
	$user = 1; // $_SESSION['iduser'];
	$contrasena = $_POST['contrasena'];
	$nombre = $_POST['nombre'];
	$imagen = $_POST['imagen'];
	
	//Setea imagen a string vacío si no tiene datos
	if (empty($imagen)){
		$imagen = "";
	}
	
	//Chequeo innecesario por el momento dado que son required en el form
	if (empty($contrasena) || empty($nombre)) {
		echo "El usuario, contraseña y nombre son campos requeridos.";
		return;
	}

	//Crea un model para obtener los métodos
	$UsuarioModel = new Usuario();
	//Llama al método para el insert a la BD
	$UsuarioModel->confirmarEditar($user, $contrasena, $nombre, $imagen);
	//Cierra la conexión
	unset($UsuarioModel);
	
	// REDIRECCIONAR AL INDEX
}

if ($action === 'grilla'){

}


/*
--USUARIOS
	Nuevo Usuario < Hecho >
	Grilla Usuarios <Pendiente>
	View Usuario < Hecho >
	Edit Usuario < Hecho >
	Validación de datos <Pendiente>

*/

/* include ("config.php");
require_once './biblioteca-php/AltaUsuarioForm.php';
require_once './biblioteca-php/models/Usuario.php';
require_once './biblioteca-php/repositories/UsuarioRepository.php';
require_once("../model/modelo.php");*/

?>
