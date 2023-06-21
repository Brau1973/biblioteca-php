<?php

// LibroController.php
require_once "models/Libro.php";

class LibroController{

    private $libro;

    public function __CONSTRUCT(){
        $this->libro=new Libro();
    }

    public function Inicio(){
        require_once "views/encabezado.php";
        require_once "views/libros/Grilla.php";
        require_once "views/pie.php";
    }

    public function FormCrear() {
        $titulo = "Registrar";
        $pHeader = "Ingresa los datos para registrar un nuevo Libro";
        $libroAux = new Libro();
        if (isset($_GET['id'])) {
            $libroAux = $this->libro->obtener($_GET['id']);
            $titulo = "Modificar";
            $pHeader = "Actualiza los datos del libro";
        }

        require_once "views/encabezado.php";
        require_once "views/libros/AltaLibroForm.php";
        require_once "views/pie.php";
    }

    public function Guardar() {
        $libro = new Libro();
        $libro->setId(intval($_POST['id']));
        $libro->setNombre($_POST['nombre']);
        $libro->setGenero($_POST['genero']);
        $libro->setAutor($_POST['autor']);
        $libro->setEditorial($_POST['editorial']);
        $libro->setDescripcion($_POST['descripcion']);
        $libro->setEnPrestamo($_POST['en_prestamo']);

        $libro->getId() > 0 ?
        $this->libro->actualizar($libro) :
        $this->libro->insertar($libro);

        header("location: ?c=Libro");
    }

    public function borrar() {
        $this->libro->eliminar($_GET["id"]);
        header("location: ?c=Libro");
    }
}

?>
