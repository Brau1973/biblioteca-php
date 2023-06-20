<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Todos Nuestros libros!</h1>
          </div>
          <div><a class="btn btn-primary btn-flat" href="?c=producto&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
          </div>
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
                      <th>En prestamo</th>
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
                      <td><?=$r->EnPrestamo?></td>
                      <td>
                          <a class="btn btn-info btn-flat" href="?c=producto&a=FormCrear&id=<?=$r->pro_id?>"><i class="fa fa-lg fa-refresh"></i></a>

                          <a class="btn btn-warning btn-flat" href="?c=producto&a=Borrar&id=<?=$r->pro_id?>"><i class="fa fa-lg fa-trash"></i></a>
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
    </div>