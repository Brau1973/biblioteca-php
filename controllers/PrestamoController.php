<?php

require_once "models/Prestamo.php";
require_once "models/Libro.php";

class PrestamoController {

    private $prestamo;
    private $libro;

    public function __CONSTRUCT() {
        $this->prestamo = new Prestamo();
        $this->libro = new Libro();

    }

    public function Inicio() {
        session_start();
        if($_SESSION['tipo'] == "administrador"){
            $textoCabezal = 'Todos los Prestamos';
        }else{
            $textoCabezal = 'Mis prestamos';
        }
        require_once "views/encabezado.php";
        require_once "views/prestamos/Grilla.php";
        require_once "views/pie.php";
    }

    public function NuevoPrestamo() {
            //session_start();

            $prestamo = new Prestamo();
            $prestamo->setLibroId(intval($_GET['id']));
            $prestamo->setUsuarioId($_SESSION['id']);
            $prestamo->setEstado('Activo');
            $this->prestamo->Insertar($prestamo);

            $libro = new Libro();
            $libro->setId(intval($_GET['id']));
            $libro->setEnPrestamo(1);
            $this->libro->ActualizarEstado($libro);

            header("location: ?c=prestamo");
    }

    public function Borrar() {
        $this->prestamo->Eliminar($_GET["id"]);
        header("location: ?c=prestamo");
    }
}

?>
