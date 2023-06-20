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

    public function altaLibro(){
        
    }
}

?>
