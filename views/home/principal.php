<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-book"></i> Todos los libros en un solo lugar!</h1>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Home</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Libros disponibles</h3>
              <p><?php $cantidadLibros=$this->libro->CountDisponibles()?>
              <?=$cantidadLibros->COUNT?> 
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Usuarios que usan nuestra biblioteca</h3>
              <p><?php $cantidadUsuarios=$this->usuario->CountDisponibles()?>
              <?=$cantidadUsuarios->COUNT?> 
              </p>
            </div>
          </div>
        </div>
        <!--<div>
          <img src="assets/images/library04.jpg" style="width: 100%;">
        </div>-->
        <div class="pic-ctn">
          <img src="assets/images/library01.jpg" alt="" class="pic">
          <img src="assets/images/library02.jpg" alt="" class="pic">
          <img src="assets/images/library03.jpg" alt="" class="pic">
          <img src="assets/images/library04.jpg" alt="" class="pic">
          <img src="assets/images/library05.jpg" alt="" class="pic">
        </div>
</div>