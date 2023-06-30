<?php

require_once "models/Usuario.php";
require_once "validacion/ValidacionUsuario.php";

class UsuarioController{

	private $usuario;
	private $validator;

    public function __CONSTRUCT(){
        $this->usuario=new Usuario();
    }

	public function Inicio(){
        require_once "views/encabezado.php";
        require_once "views/pie.php";
    }

	public function FormCrear() {
        $titulo = "Registrar Usuario";
        $pHeader = "Ingrese sus datos";
        $usuarioAux = new Usuario();
        if (isset($_GET['id'])) {		// VER QUÉ ES ID EXACTAMENTE
            $usuarioAux = $this->usuario->obtener($_GET['id']);
            $titulo = "Modificar";
            $pHeader = "Actualice sus datos";
        }

        require_once "views/encabezado.php";
        require_once "views/usuarios/AltaUsuarioForm.php";
        require_once "views/pie.php";
    }
	
	public function Guardar() {
		$validator = new ValidacionUsuario();
		$user = $validator->test_input($_POST['usuario']);
		$contrasena = $validator->test_input($_POST['contrasena']);
		$nombre = $validator->test_input($_POST['nombre']);
		$imagen = "";
		if (!empty($_POST['imagen'])){
			$imagen = $validator->test_input($_POST['imagen']);
		}
		$usuario = new Usuario();
		if(intval($_POST['id']) > 0){
			if($validator->contraValido($contrasena) && $validator->nombreValido($nombre) 
						&& $validator->imagenValido($imagen)){
				$usuario->setIdUsuario(intval($_POST['id']));
				$usuario->setUsuario($user);
				$usuario->setContrasena($contrasena);
				$usuario->setNombre($nombre);
				$usuario->setImagen($imagen);
				$this->usuario->Actualizar($usuario);
			}
			header("location: ?c=Usuario&a=FormCrear");
		}else{
			if($validator->usuarioValido($user) && $validator->contraValido($contrasena) 
				&& $validator->nombreValido($nombre) && $validator->imagenValido($imagen)){
				$usuario->setIdUsuario(intval($_POST['id']));
				$usuario->setUsuario($user);
				$usuario->setContrasena($contrasena);
				$usuario->setNombre($nombre);
				$usuario->setImagen($imagen);
				$this->usuario->Insertar($usuario);
			}
			header("location: ?");
		}

    }

	public function Login(){
		require_once "views/encabezado.php";
        require_once "views/home/login.php";
        require_once "views/pie.php";
	}

	public function finishLogin(){
		$usuario = new Usuario();
		$usuario = $this->usuario->ObtenerPorUser($_POST['usuario']);
		if ($usuario->getIdUsuario()!=NULL && $usuario->getContrasena()==$_POST['contrasena']){
			$_SESSION['id']=$usuario->getIdUsuario();
			$_SESSION['usuario']=$usuario->getUsuario();
			$_SESSION['tipo']=$usuario->getTipo();
			$_SESSION['imagen']=$usuario->getImagen();
		}else{
			$_SESSION['error'] = "El usuario o contraseña<br>no son correctos.";
		}
		header("location: ?");
	}

	public function Logout(){
		unset($_SESSION['id']);
		unset($_SESSION['usuario']);
		unset($_SESSION['tipo']);
		unset($_SESSION['imagen']);
		session_destroy();
		header("location: ?");
	}
}

?>
