<?php
class Prestamo {

  private $pdo;

  private $id;
  private $libroId;
  private $usuarioId;
  private $estado;
  
  //--------------------------- CONSTRUCTORES ---------------------------
  public function __construct() {
    $this->pdo = ConexionPDO::Conectar();
  }
  
  // --------------------------- GETTERS Y SETTER ---------------------------
  
  public function getId() {
    return $this->id;
  }
  
  public function setId($id) {
    $this->id = $id;
  }
  
  public function getLibroId() {
    return $this->libroId;
  }
  
  public function setLibroId($libroId) {
    $this->libroId = $libroId;
  }
  
  public function getUsuarioId() {
    return $this->usuarioId;
  }
  
  public function setUsuarioId($usuarioId) {
    $this->usuarioId = $usuarioId;
  }
  
  public function getEstado() {
    return $this->estado;
  }
  
  public function setEstado($estado) {
    $this->estado = $estado;
  }

  // --------------------------- OTROS METODOS ---------------------------
  public function ListadoGeneral() {
    try {
      $consulta = $this->pdo->prepare("SELECT p.*, l.Nombre AS Libro, u.Nombre AS Usuario
                                      FROM prestamos p
                                      INNER JOIN libros l ON p.libro_id = l.Id
                                      INNER JOIN usuarios u ON p.usuario_id = u.IdUsuario;");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  public function ListadoDeUnUsuario($idUsuario) {
    try {
      $consulta = $this->pdo->prepare("SELECT p.*, l.Nombre AS Libro, u.Nombre AS Usuario
                                      FROM prestamos p
                                      INNER JOIN libros l ON p.libro_id = l.Id
                                      INNER JOIN usuarios u ON p.usuario_id = u.IdUsuario
                                      Where u.IdUsuario = ?;");
      $consulta->execute(array($idUsuario));
      return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  public function Insertar(Prestamo $prestamo) {
    try {
        $consulta = "INSERT INTO prestamos(id, usuario_id, libro_id, estado) VALUES (?, ?, ?, ?);";
        $this->pdo->prepare($consulta)->execute(array(
            $prestamo->getId(),
            $prestamo->getUsuarioId(),
            $prestamo->getLibroId(),
            $prestamo->getEstado()
        ));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  // SOLO SE ACTUALIZA EL ESTADO AL DEVOLVER EL LIBRO
  public function Actualizar(Prestamo $prestamo) {
    try {
        $consulta = "UPDATE prestamos SET Estado=? WHERE Id=?;";
        $this->pdo->prepare($consulta)->execute(array(
            $prestamo->getEstado(),
            $prestamo->getId()
        ));
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }  
}
?>