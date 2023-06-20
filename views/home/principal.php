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
            </div>
          </div>
        </div>
      </div>
    </div>