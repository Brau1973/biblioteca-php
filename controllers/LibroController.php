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

        // Validar que el campo Autor no contenga números
        $autor = $_POST['autor'];
        if (preg_match('/\d/', $autor)) {
            $msgError = "El campo Autor no debe contener números";
            session_start();
            $_SESSION['errorAutorValidacion'] = $msgError;
            
            // Redirigir al formulario de alta
            header("location: ?c=libro&a=FormCrear");
            exit; // Asegurar que el script se detiene después de la redirección
        } else {
            $libro = new Libro();
            $libro->setId(intval($_POST['id']));
            $libro->setNombre($_POST['nombre']);
            $libro->setGenero($_POST['genero']);
            $libro->setAutor($autor);
            $libro->setEditorial($_POST['editorial']);
            $libro->setDescripcion($_POST['descripcion']);
    
            $libro->getId() > 0 ?
            $this->libro->actualizar($libro) :
            $this->libro->insertar($libro);
    
            header("location: ?c=libro");
        }
    }

    public function MarcarInactivo() {
        $this->libro->EliminarLogico($_GET["id"]);
        header("location: ?c=libro");
    }

    public function MarcarActivo() {
        $this->libro->AltaLogica($_GET["id"]);
        header("location: ?c=libro");
    }

}

?>
