<?php
// Punto de entrada de la aplicación
// Aquí puedes realizar el enrutamiento a los controladores correspondientes

// Ejemplo de enrutamiento para el alta de libro
// Verificar si la clave "action" está definida antes de acceder a ella
if (isset($_GET['action'])) {
  $action = $_GET['action'];
  if ($action === 'alta_libro') {
    require_once 'controllers/LibroController.php';
    $libroController = new LibroController();
    $libroController->altaLibro();
  }
  // Resto de tu código para manejar la acción
} else {
  // Acción por defecto si no se proporciona ninguna
  $action = 'default';
}

// Resto de tu código aquí
?>


