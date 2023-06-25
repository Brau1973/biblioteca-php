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

  // EN CASO DE USU ADMIN LOGUEADO DEBERIA BUSCAR TODOS LOS PRESTAMOS
  // EN CASO DE USU LECTOR LOGUEADO DEBERIA BUSCAR SOLO LOS DE ESE USU
  public function Listar() {
    try {
        /* Verificar si el usuario es administrador */ 
        if ($pdo.is_bool()) {
            $consulta = $this->pdo->prepare("SELECT * FROM prestamos;");
        } else {
            $consulta = $this->pdo->prepare("SELECT * FROM prestamos WHERE usuarioId = :usuarioId;");
            $consulta->bindParam(':usuarioId', /* Obtener el ID del usuario lector logueado */);
        }
        
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        die($e->getMessage());
    }
  }

  public function Insertar(Prestamo $prestamo) {
    try {
        $consulta = "INSERT INTO prestamos(Id, UsuarioId, LibroId, Estado) VALUES (?, ?, ?, ?);";
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