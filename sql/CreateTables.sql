CREATE TABLE libros (
    Id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Nombre VARCHAR(255) NOT NULL,
    Genero VARCHAR(255) NOT NULL,
    Autor VARCHAR(255) NOT NULL,
    Editorial VARCHAR(255) NOT NULL,
    Descripcion TEXT,
    EnPrestamo BOOLEAN DEFAULT false
);

CREATE TABLE IF NOT EXISTS `biblioteca`.`usuarios` (
  `IdUsuario` INT NOT NULL AUTO_INCREMENT,
  `Usuario` VARCHAR(45) NOT NULL,
  `Contrasena` VARCHAR(45) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Imagen` VARCHAR(200) NOT NULL DEFAULT 'https://www.pngarts.com/files/10/Default-Profile-Picture-PNG-Transparent-Image.png',
  `Tipo` VARCHAR(45) NOT NULL DEFAULT 'cliente',
  PRIMARY KEY (`IdUsuario`),
  UNIQUE INDEX `idusuario_UNIQUE` (`IdUsuario` ASC)
