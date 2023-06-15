<?php
class Libro {
    private $id;
    private $nombre;
    private $descripcion;
    private $en_prestamo;

    public function __construct($nombre, $descripcion, $en_prestamo = false) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->en_prestamo = $en_prestamo;
    }

    // Getters y setters para las propiedades
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getEnPrestamo() {
        return $this->en_prestamo;
    }

    public function setEnPrestamo($en_prestamo) {
        $this->en_prestamo = $en_prestamo;
    }

    // Otros métodos relacionados con la lógica de negocio de los libros
}
?>
