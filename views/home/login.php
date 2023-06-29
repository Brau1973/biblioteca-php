<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-book"></i> Bienvenido a la Biblioteca!</h1>
          </div>
          <!-- <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Home</a></li>
            </ul>
          </div> -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=Usuario&a=FinishLogin">
                      <fieldset>
                          <legend>Inicio de sesión</legend>
                          <div class="form-group">

                              <label class="col-lg-2 control-label" for="usuario">Usuario</label>
                              <div class="col-lg-10">
                                  <input required class="form-control" name="usuario" type="text" placeholder="Su nombre de usuario">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label" for="contrasena">Contraseña</label>
                              <div class="col-lg-10">
                                  <input required class="form-control" name="contrasena" type="password" placeholder="Su contraseña">
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="col-lg-10 col-lg-offset-2">
                                  <!--<button class="btn btn-default" type="reset" onclick="history.back()">Registrar</button>-->
																	<a href="?c=Usuario&a=FormCrear" class="btn btn-default">Registrarse</a>
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