<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/models/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/config/Conexion.php';
//include $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/config/Conexion.php';

class Usuario
{
    private $conexion; // Objeto de conexión a la base de datos
    
    
	public function __construct(){

        // Inicializar la conexión a la base de datos
		$this->conexion = Conectarse();
        //$this->conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_basedatos");
        
        // Verificar si ocurrió algún error en la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

    }
    
    public function __destruct(){

        // Cerrar la conexión a la base de datos al finalizar
        CerrarConexion($this->conexion);

    }
	
    
    public function altaUsuario($user, $contrasena, $nombre, $imagen){

        // Escapar los valores para prevenir inyección de SQL
		$user = $this->conexion->real_escape_string($user);
		$contrasena = $this->conexion->real_escape_string($contrasena);
		$nombre = $this->conexion->real_escape_string($nombre);
		$imagen = $this->conexion->real_escape_string($imagen);
        
        // Se construye la query, se podría preparar también, pero funciona así
		if ($imagen != ""){
			$sql = "INSERT INTO usuarios (Usuario, Contrasena, Nombre, Imagen) VALUES ('$user', '$contrasena', '$nombre', '$imagen')";
        }else{
			$sql = "INSERT INTO usuarios (Usuario, Contrasena, Nombre) VALUES ('$user', '$contrasena', '$nombre')";
		}
        // Ejecuta la query
        if ($this->conexion->query($sql) === TRUE) {
            echo "Usuario guardado exitosamente";	//Esto se podría guardar como un dato de Session para ponerlo en un lugar particular del index o del form de registro
        } else {
            echo "Error al guardar el usuario: " . $this->conexion->error;
        }

    }
    
    public function perfilUsuario($user){
        // Se construye la query
        $sql = "SELECT Usuario, Nombre, Imagen FROM usuarios WHERE idusuario = '$user'";
         // Ejecuta la query
        $perfil = $this->conexion->query($sql);
        $datos = $perfil->fetch_all(MYSQLI_ASSOC);
        return $datos;
    }
}


?>