<?php

require_once "models/Prestamo.php";

class PrestamoController {

    private $prestamo;

    public function __CONSTRUCT() {
        $this->prestamo = new Prestamo();
    }

    public function Inicio() {
      session_start();
      if(1>0){ //$_SESSION['usuarioRol'] = 'lector'
        $textoCabezal = 'Todos los Prestamos';
      }else{
        $textoCabezal = 'Mis prestamos';
      }
      require_once "views/encabezado.php";
      require_once "views/prestamos/Grilla.php";
      require_once "views/pie.php";
    }

    public function FormCrear() {
        $titulo = "Registrar";
        $pHeader = "Ingresa los datos para registrar un nuevo Préstamo";
        $prestamoAux = new Prestamo();
        if (isset($_GET['id'])) {
            $prestamoAux = $this->prestamo->obtener($_GET['id']);
            $titulo = "Modificar";
            $pHeader = "Actualiza los datos del préstamo";
        }

        require_once "views/encabezado.php";
        require_once "views/prestamos/AltaPrestamoForm.php";
        require_once "views/pie.php";
    }

    public function Guardar() {
        // Validar que el campo Autor no contenga números
        $estado = $_POST['estado'];
        if (preg_match('/\d/', $estado)) {
            $msgError = "El campo Estado no debe contener números";
            session_start();
            $_SESSION['errorEstadoValidacion'] = $msgError;
            
            // Redirigir al formulario de alta
            header("location: ?c=prestamo&a=FormCrear");
            exit;
        } else {
            $prestamo = new Prestamo();
            $prestamo->setId(intval($_POST['id']));
            $prestamo->setEstado($_POST['estado']);

            $prestamo->getId() > 0 ?
                $this->prestamo->Actualizar($prestamo) :
                $this->prestamo->Insertar($prestamo);

            header("location: ?c=prestamo");
        }
    }

    public function Borrar() {
        $this->prestamo->Eliminar($_GET["id"]);
        header("location: ?c=prestamo");
    }
}

?>
