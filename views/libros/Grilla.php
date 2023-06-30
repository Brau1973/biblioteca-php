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
                <?PHP if($_SESSION['tipo'] == "administrador"){?>
                  <th>Activo?</th>
                <?PHP } ?> 
              </tr>
            </thead>
            <tbody>
            <?PHP if($_SESSION['tipo'] == "administrador"){
              $listadoLibros = $this->libro->Listar(); 
            }else{ 
              $listadoLibros = $this->libro->ListarActivos();
            } ?> 
              <?php foreach($listadoLibros as $r):?>
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
                <?PHP if($_SESSION['tipo'] == "administrador"){?>
                  <td <?php if ($r->Activo == 1): ?>style="background-color: lightgreen;"<?php else: ?>style="background-color: lightcoral;"<?php endif; ?>>
                      <?php if ($r->Activo == 1): 
                        $btnClass = "btn btn-warning btn-flat";
                        $href = "?c=libro&a=MarcarInactivo&id=$r->Id";
                        $iconClass = "fa fa-lg fa-trash";
                      ?>
                          Si
                      <?php else: 
                        $btnClass = "btn btn-success btn-flat";
                        $href = "?c=libro&a=MarcarActivo&id=$r->Id";
                        $iconClass = "fa fa-lg fa-plus";
                      ?>
                          No
                      <?php endif; ?>
                  </td>
                <?PHP }?>
                  <td>  
                    <?PHP if($_SESSION['tipo'] == "administrador"){?>
                      <a class="btn btn-info btn-flat" href="?c=libro&a=FormCrear&id=<?=$r->Id?>"><i class="fa fa-lg fa-refresh"></i></a>
                      <?php if ($r->EnPrestamo == 0): ?>
                        <a class="<?php echo $btnClass; ?>" href=<?=$href?>><i class="<?php echo $iconClass; ?>"></i></a>
                      <?php endif; ?>
                    <?PHP } ?>
                    <?php if ($r->EnPrestamo == 0): ?>
                      <a class="btn btn-primary btn-flat" href="?c=prestamo&a=NuevoPrestamo&id=<?=$r->Id?>"><i class="fa fa-lg fa fa-get-pocket"></i></a>
                    <?php endif; ?>
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
