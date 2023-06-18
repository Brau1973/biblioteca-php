<?php
require_once "modelos/basededatos.php";

// Info en link
// c = controlador
// a = action
if(!isset($_GET['c'])){
    require_once "controladores/inicio.controlador.php";
    $controlador = new InicioControlador();
    // call_user_func llama a un metodo especifico de un objeto dado
    // en este caso el objto es el controlador y el metodo es inicio
    call_user_func(array($controlador,"Inicio"));
}else{
    $controlador = $_GET['c']; 
    require_once "controladores/$controlador.controlador.php";

    //Pone en mayus la primera letra de cada palabra
    //en el string dentro de la variable
    $controlador = ucwords($controlador)."Controlador"; 
    
    $controlador = new $controlador;
    // si la action esta seteada la tomo sino asumo Inicio como action
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));
}
?>