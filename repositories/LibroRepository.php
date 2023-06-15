<?php

// LibroRepository.php

class LibroRepository
{
    private $conexion; // Objeto de conexión a la base de datos
    
    public function __construct()
    {
        // Inicializar la conexión a la base de datos
        $this->conexion = new mysqli("localhost", "usuario", "contraseña", "nombre_basedatos");
        
        // Verificar si ocurrió algún error en la conexión
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
    
    public function guardarLibro(Libro $libro)
    {
        // Escapar los valores para prevenir inyección de SQL
        $nombre = $this->conexion->real_escape_string($libro->getNombre());
        $descripcion = $this->conexion->real_escape_string($libro->getDescripcion());
        
        // Construir la sentencia SQL de inserción
        $sql = "INSERT INTO Libros (Nombre, Descripcion, EnPrestamo) VALUES ('$nombre', '$descripcion', false)";
        
        // Ejecutar la sentencia SQL
        if ($this->conexion->query($sql) === TRUE) {
            echo "Libro guardado exitosamente";
        } else {
            echo "Error al guardar el libro: " . $this->conexion->error;
        }
    }
    
    public function __destruct()
    {
        // Cerrar la conexión a la base de datos al finalizar
        $this->conexion->close();
    }
}


?>
