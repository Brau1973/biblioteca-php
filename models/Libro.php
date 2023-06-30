<?php
class Libro {

    private $pdo;

    private $id;
    private $nombre;
    private $genero;
    private $autor;
    private $editorial;
    private $descripcion;
    private $en_prestamo;
    private $activo;

    //--------------------------- CONSTRUCTORES ---------------------------
    public function __construct() {
        $this->pdo = ConexionPDO::Conectar();
    }

    // public function __construct($nombre, $descripcion, $en_prestamo = false) {
    //     $this->pdo = BaseDeDatos::Conectar();

    //     $this->nombre = $nombre;
    //     $this->descripcion = $descripcion;
    //     $this->en_prestamo = $en_prestamo;
    // }

    // --------------------------- GETTERS Y SETTER ---------------------------
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getEditorial() {
        return $this->editorial;
    }

    public function setEditorial($editorial) {
        $this->editorial = $editorial;
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

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    // --------------------------- OTROS MÉTODOS ---------------------------
    public function CountDisponibles(){
        try{
            $consulta=$this->pdo->prepare("SELECT COUNT(Id) as COUNT FROM libros WHERE EnPrestamo = 0 AND Activo = 1;");
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Listar(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libros;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ListarActivos(){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libros WHERE Activo = 1;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Obtener($id){
        try{
            $consulta=$this->pdo->prepare("SELECT * FROM libros WHERE Id=?;");
            $consulta->execute(array($id));
            $r=$consulta->fetch(PDO::FETCH_OBJ);
            $libroAux = new Libro();
            $libroAux->setId($r->Id);
            $libroAux->setNombre($r->Nombre);
            $libroAux->setGenero($r->Genero);
            $libroAux->setAutor($r->Autor);
            $libroAux->setEditorial($r->Editorial);
            $libroAux->setDescripcion($r->Descripcion);
            $libroAux->setEnPrestamo($r->EnPrestamo);
            $libroAux->setActivo($r->Activo);

            return $libroAux;

        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Insertar(Libro $libro){
        try{
            $consulta="INSERT INTO libros(Id,Nombre,Genero,Autor,Editorial,Descripcion,EnPrestamo,Activo) VALUES (?,?,?,?,?,?,?,?);";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $libro->getId(),
                        $libro->getNombre(),
                        $libro->getGenero(),
                        $libro->getAutor(),
                        $libro->getEditorial(),
                        $libro->getDescripcion(),
                        0,
                        1
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function Actualizar(Libro $libro){
        try{
            $consulta="UPDATE libros SET 
                Nombre=?,
                Genero=?,
                Autor=?,
                Editorial=?,
                Descripcion=?
                WHERE Id=?;
            ";
            $this->pdo->prepare($consulta)
                    ->execute(array(
                        $libro->getNombre(),
                        $libro->getGenero(),
                        $libro->getAutor(),
                        $libro->getEditorial(),
                        $libro->getDescripcion(),
                        $libro->getId()
                    ));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function EliminarLogico($id){
        try{
            $consulta="UPDATE libros SET Activo=0 WHERE Id=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function AltaLogica($id){
        try{
            $consulta="UPDATE libros SET Activo=1 WHERE Id=?;";
            $this->pdo->prepare($consulta)
                    ->execute(array($id));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function ActualizarEstado(Libro $libro){
        try{
            $consulta="UPDATE libros SET EnPrestamo=? WHERE Id=?;";
            $this->pdo->prepare($consulta)->execute(array($libro->getEnPrestamo(),$libro->getId()));
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

}
?>
