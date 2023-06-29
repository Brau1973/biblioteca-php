<?php
  session_start();
  if (isset($_SESSION['errorAutorValidacion'])) :
    $mensaje = $_SESSION['errorAutorValidacion'];
    unset($_SESSION['errorAutorValidacion']);
?>
    <div id="custom-alert">
      <div class="alert-overlay"></div>
      <div class="alert-box">
        <h2>Warning</h2>
        <p><?= $mensaje ?></p>
        <button class="close-btn" onclick="closeAlert()">Cerrar</button>
      </div>
    </div>
<?php endif; ?>

<div class="content-wrapper">
    <div class="page-title">
      <div>
        <h1><i class="fa fa-edit"></i> Libros</h1>
        <p><?=$pHeader?></p>
      </div>
      <div>
        <ul class="breadcrumb">
          <li><i class="fa fa-home fa-lg"></i></li>
          <li>Libros</li>
          <li><a href="#"><?=$titulo?> Libro</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="row">
            <div class="col-lg-6">
              <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="?c=libro&a=Guardar">
                  <fieldset>
                      <legend><?=$titulo?> Libro</legend>
                      <div class="form-group">
                          <input class="form-control" name="id" type="hidden" value="<?=$libroAux->getId()?>">

                          <label class="col-lg-2 control-label" for="nombre">Nombre</label>
                          <div class="col-lg-10">
                              <input required class="form-control" name="nombre" type="text" placeholder="Nombre del libro" value="<?=$libroAux->getNombre()?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="genero">Género</label>
                          <div class="col-lg-10">
                              <input required class="form-control" name="genero" type="text" placeholder="Género del libro" value="<?=$libroAux->getGenero()?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="autor">Autor</label>
                          <div class="col-lg-10">
                              <input required class="form-control" name="autor" type="text" placeholder="Autor del libro" value="<?=$libroAux->getAutor()?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="editorial">Editorial</label>
                          <div class="col-lg-10">
                              <input required class="form-control" name="editorial" type="text" placeholder="Editorial del libro" value="<?=$libroAux->getEditorial()?>">
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="descripcion">Descripción</label>
                          <div class="col-lg-10">
                              <textarea required class="form-control" name="descripcion" placeholder="Descripción del libro"><?=$libroAux->getDescripcion()?></textarea>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset" onclick="window.location.href='?c=libro'">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                      </div>
                  </fieldset>
                </form>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>