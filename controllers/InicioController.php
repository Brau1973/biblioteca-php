<?php

require_once "models/Libro.php";

class InicioController{
    private $libro;

    public function __CONSTRUCT(){
        $this->libro=new Libro();
    }

    public function Inicio(){
        require_once "views/encabezado.php";
        require_once "views/home/principal.php";
        require_once "views/pie.php";
    }

}