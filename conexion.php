<?php
// Datos de conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$contraseña = 'root';
$base_datos = 'biblioteca';

// Crear la conexión
$conexion = new mysqli($host, $usuario, $contraseña, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el juego de caracteres UTF-8
$conexion->set_charset("utf8");

// Código adicional para configurar la conexión según tus necesidades

?>
