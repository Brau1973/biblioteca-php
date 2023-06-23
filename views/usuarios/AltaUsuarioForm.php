<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Usuarios</h1>
            <p><?=$pHeader?></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li> Usuarios</li>
              <li><a href="#"><?=$titulo?> Usuario</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=Usuario&a=Guardar">
                      <fieldset>
                          <legend><?=$titulo?> Usuario</legend>
                          <div class="form-group">
                              <input class="form-control" name="id" type="hidden" value="<?=$usuarioAux->getIdUsuario()?>">

                              <label class="col-lg-2 control-label" for="nombre">Usuario</label>
                              <div class="col-lg-10">
                                  <input required class="form-control" name="usuario" type="text" placeholder="Su nombre de usuario" <?php if($titulo == "Modificar") echo "readonly" ?> value="<?=$usuarioAux->getUsuario()?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label" for="genero">Contraseña</label>
                              <div class="col-lg-10">
                                  <input required class="form-control" name="contrasena" type="text" placeholder="Su contraseña" value="<?=$usuarioAux->getContrasena()?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label" for="autor">Nombre</label>
                              <div class="col-lg-10">
                                  <input required class="form-control" name="nombre" type="text" placeholder="Su nombre" value="<?=$usuarioAux->getNombre()?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label" for="editorial">Imagen</label>
                              <div class="col-lg-10">
                                  <input required class="form-control" name="imagen" type="text" placeholder="Link a su imagen" value="<?=$usuarioAux->getImagen()?>">
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-lg-10 col-lg-offset-2">
                                  <button class="btn btn-default" type="reset" onclick="history.back()">Cancelar</button>
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