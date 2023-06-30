<?php
/*require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/models/Usuario.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/config/Conexion.php';*/
//include $_SERVER['DOCUMENT_ROOT'].'/biblioteca-php/config/Conexion.php';

class Usuario
{
    //private $conexion; // Objeto de conexión a la base de datos
    
    private $pdo;

    private $idUsuario;
    private $usuario;
    private $contrasena;
    private $nombre;
    private $imagen;
    private $tipo;
    
	public function __construct(){

        // Inicializar la conexión a la base de datos
		$this->pdo = ConexionPDO::Conectar();

    }
    
    /*public function __destruct(){

        // Cerrar la conexión a la base de datos al finalizar
        CerrarConexion($this->conexion);

    }*/
	
    //GETTERS Y SETTERS

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    
    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    
    public function getTipo() {
        return $this->tipo;
    }
    
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }
    

    // FUNCIONES

    public function CountDisponibles(){
        try{
            $consulta=$this->pdo->prepare("SELECT COUNT(IdUsuario) as COUNT FROM usuarios WHERE Tipo = 'cliente';");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Usuario $usuario){
        if ($usuario->getImagen()!=""){
            try{
                $consulta="INSERT INTO usuarios(Usuario, Contrasena, Nombre, Imagen) VALUES (?,?,?,?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $usuario->getUsuario(),
                            $usuario->getContrasena(),
                            $usuario->getNombre(),
                            $usuario->getImagen()
                            ));
                $_SESSION['exito'] = "Alta de usuario exitosa.";
            }catch(Exception $e){
                die($e->getMessage());
            }
        }else{
            try{
                $consulta="INSERT INTO usuarios(Usuario, Contrasena, Nombre) VALUES (?,?,?);";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $usuario->getUsuario(),
                            $usuario->getContrasena(),
                            $usuario->getNombre()
                            ));
                $_SESSION['exito'] = "Alta de usuario exitosa.";
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }
    
    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuarios WHERE IdUsuario=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $usuarioAux = new Usuario();
            $usuarioAux->setIdUsuario($r->IdUsuario);
            $usuarioAux->setUsuario($r->Usuario);
            $usuarioAux->setContrasena($r->Contrasena);
            $usuarioAux->setNombre($r->Nombre);
            $usuarioAux->setImagen($r->Imagen);
            $usuarioAux->setTipo($r->Tipo);

            return $usuarioAux;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ValidacionUser($user){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuarios WHERE Usuario=?;");
            $consulta->execute(array($user));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $usuarioAux = new Usuario();
            $usuarioAux->setIdUsuario($r->IdUsuario);
            $usuarioAux->setUsuario($r->Usuario);
            $usuarioAux->setContrasena($r->Contrasena);
            $usuarioAux->setNombre($r->Nombre);
            $usuarioAux->setImagen($r->Imagen);
            $usuarioAux->setTipo($r->Tipo);
            if (!empty($usuarioAux->getUsuario()))
                return true;
            else
                return false;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    
    public function Actualizar(Usuario $usuario){
        if($usuario->getImagen()!=""){
            try{
                $consulta="UPDATE usuarios SET 
                    Contrasena=?,
                    Nombre=?,
                    Imagen=?
                    WHERE IdUsuario=?;
                ";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $usuario->getContrasena(),
                            $usuario->getNombre(),
                            $usuario->getImagen(),
                            $usuario->getIdUsuario()
                            ));
                $_SESSION['exito'] = "Modificación de datos exitosa.";
            }catch(Exception $e){
                die($e->getMessage());
            }
        }else{
            try{
                $consulta="UPDATE usuarios SET 
                    Contrasena=?,
                    Nombre=?,
                    WHERE IdUsuario=?;
                ";
                $this->pdo->prepare($consulta)
                        ->execute(array(
                            $usuario->getContrasena(),
                            $usuario->getNombre(),
                            $usuario->getIdUsuario()
                            ));
                $_SESSION['exito'] = "Modificación de datos exitosa.";
            }catch(Exception $e){
                die($e->getMessage());
            }
        }
    }

    public function ObtenerPorUser($user){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM usuarios WHERE Usuario=?;");
            $consulta->execute(array($user));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $usuarioAux = new Usuario();
            $usuarioAux->setIdUsuario($r->IdUsuario);
            $usuarioAux->setUsuario($r->Usuario);
            $usuarioAux->setContrasena($r->Contrasena);
            $usuarioAux->setNombre($r->Nombre);
            $usuarioAux->setImagen($r->Imagen);
            $usuarioAux->setTipo($r->Tipo);
            return $usuarioAux;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}


?>