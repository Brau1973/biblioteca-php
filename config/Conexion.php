<?php
// Datos de conexión a la base de datos

function Conectarse(){
	$host = 'localhost';
	$usuario = 'root';
	$contraseña = 'seba1234';
	$base_datos = 'biblioteca';
	$link = mysqli_connect($host, $usuario, $contraseña, $base_datos);
	if ($link->connect_error) {
			die("Error de conexión: " . $conexion->connect_error);
		}
	return $link;
}

function CerrarConexion($link){
	mysqli_close($link);
}

/*
class Conexion{
	private $conexion = NULL;
	
	private function __construct() {
		$this->conexion = new mysqli($host, $usuario, $contraseña, $base_datos);
		
		if ($conexion->connect_error) {
			die("Error de conexión: " . $conexion->connect_error);
		}
	}
	
	
	public getConexion(){
		if ($conexion != NULL){
			return $this->conexion();
		}else{
			$conexion = new Conexion();
			return $this->conexion;
		}
	}
	
	public cerrarConexion(){
		$this->conexion
	}
}

function obtenerConexion(){
	return $conexion;
}*/

?>
