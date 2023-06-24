<?php

require_once "models/Libro.php";
require_once "models/Usuario.php";

class InicioController{
    private $libro;
    private $usuario;

    public function __CONSTRUCT(){
        $this->libro=new Libro();
        $this->usuario=new Usuario();

        // ¿Hacer getUser para asociarlo y que queden los datos después del login?
    }

    public function Inicio(){
        require_once "views/encabezado.php";
        require_once "views/home/principal.php";
        require_once "views/pie.php";
    }

}