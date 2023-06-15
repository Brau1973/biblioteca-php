<?php

// LibroController.php

class LibroController
{
    public function altaLibro()
    {
        // Renderizar la vista del formulario de alta de libro
        include_once "views/AltaLibroForm.php";

        // Obtener los datos del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        
        // Validar los campos requeridos
        if (empty($nombre) || empty($descripcion)) {
            echo "El nombre y la descripción son campos requeridos";
            return;
        }
        
        // Crear el objeto Libro
        $libro = new Libro($nombre, $descripcion);
        
        // Crear el objeto LibroRepository
        $libroRepository = new LibroRepository();
        
        // Guardar el libro en la base de datos
        $libroRepository->guardarLibro($libro);
    }
}

?>
