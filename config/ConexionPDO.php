<?php

require_once 'ConfigBD.php';

class ConexionPDO {

    public static function Conectar() {
        try {
            $conexion = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8", DB_USERNAME, DB_PASSWORD);

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;

        } catch (PDOException $e) {
            return "Falló " . $e->getMessage();
        }
    }
}
?>
