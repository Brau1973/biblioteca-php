<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
require_once "config/ConexionPDO.php";

// Info en link
// c = controlador
// a = action
if(!isset($_GET['c']) && isset($_SESSION['id'])){
    require_once "controllers/InicioController.php";
    $controlador = new InicioController();
    // call_user_func llama a un metodo especifico de un objeto dado
    // en este caso el objto es el controlador y el metodo es inicio
    call_user_func(array($controlador,"Inicio"));

//Cuando haya login, añadir chequeo de ID para enviar a Inicio o Login

}else if(!isset($_GET['c']) && !isset($_SESSION['id'])){
    require_once "controllers/UsuarioController.php";
    $controlador = new UsuarioController();
    // call_user_func llama a un metodo especifico de un objeto dado
    // en este caso el objto es el controlador y el metodo es inicio
    call_user_func(array($controlador,"Login"));
}else{
    $controlador = $_GET['c'];
    //Pone en mayus la primera letra de cada palabra
    //en el string dentro de la variable
    $controlador = ucwords($controlador);
    require_once "controllers/" . $controlador . "Controller.php";

    // require_once "controladores/$controlador.controlador.php";


    $controlador = $controlador."Controller"; 
    
    $controlador = new $controlador;
    // si la action esta seteada la tomo sino asumo Inicio como action
    $accion = isset($_GET['a']) ? $_GET['a'] : "Inicio";
    call_user_func(array($controlador,$accion));
}
?>