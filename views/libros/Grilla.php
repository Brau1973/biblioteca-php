<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1>Todos Nuestros libros!</h1>
    </div>
    <?PHP if($_SESSION['tipo'] == "administrador"){?>
      <div>
        <a class="btn btn-primary btn-flat" href="?c=libro&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
      </div>
    <?PHP } ?> 
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Genero</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Disponible?</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($this->libro->Listar() as $r):?>
              <tr>
                <td><?=$r->Id?></td>
                <td><?=$r->Nombre?></td>
                <td><?=$r->Genero?></td>
                <td><?=$r->Autor?></td>
                <td><?=$r->Editorial?></td>
                <td <?php if ($r->EnPrestamo == 1): ?>style="background-color: lightcoral;"<?php else: ?>style="background-color: lightgreen;"<?php endif; ?>>
                  <?php if ($r->EnPrestamo == 0): ?>
                    Si
                  <?php else: ?>
                    No
                  <?php endif; ?>
                </td>
                  <td>  
                    <?PHP if($_SESSION['tipo'] == "administrador"){?>
                      <a class="btn btn-info btn-flat" href="?c=libro&a=FormCrear&id=<?=$r->Id?>"><i class="fa fa-lg fa-refresh"></i></a>
                      <a class="btn btn-warning btn-flat" href="?c=libro&a=Borrar&id=<?=$r->Id?>"><i class="fa fa-lg fa-trash"></i></a>
                    <?PHP } ?>
                    <a class="btn btn-primary btn-flat" href="?c=prestamo&a=NuevoPrestamo&id=<?=$r->Id?>"><i class="fa fa-lg fa fa-get-pocket"></i></a>
                  </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
