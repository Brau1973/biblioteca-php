<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/models/Usuario.php';

$action = $_GET['action'];

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
	require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/views/AltaUsuarioForm.php';
}

/*
--USUARIOS
	Nuevo Usuario
	Grilla Usuarios
	View Usuario
	Edit Usuario

*/

/* include ("config.php");
require_once './biblioteca-php/AltaUsuarioForm.php';
require_once './biblioteca-php/models/Usuario.php';
require_once './biblioteca-php/repositories/UsuarioRepository.php';
require_once("../model/modelo.php");*/

?>
