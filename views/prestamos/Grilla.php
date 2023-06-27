<div class="content-wrapper">
    <div class="page-title">
        <div>
            <h1><?=$textoCabezal?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <?PHP if($_SESSION['tipo'] == "administrador"){?>
                                <tr>
                                    <th>Id</th>
                                    <th>Libro</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                </tr>
                            <?php }else{ ?>
                                <tr>
                                    <th>Id</th>
                                    <th>Libro</th>
                                    <th>Estado</th>
                                </tr>
                            <?php } ?>
                        </thead>
                        <tbody>
                        <?PHP if($_SESSION['tipo'] == "administrador"){
                            $listadoPrestamos = $this->prestamo->ListadoGeneral();
                        }else{
                            $listadoPrestamos = $this->prestamo->ListadoDeUnUsuario($_SESSION['id']);
                        } ?> 
                            <?php foreach ($listadoPrestamos as $p) : ?>
                                <tr style="background-color: <?php echo $p->estado === 'Devuelto' ? '#f2f2f2' : '#c8e6c8'; ?>">
                                    <td><?= $p->id ?></td>
                                    <td><?= $p->Libro ?></td>
                                    <?php if($_SESSION['tipo'] == "administrador"): ?>
                                        <td><?= $p->Usuario ?></td>
                                    <?php endif; ?>
                                    <td><?= $p->estado ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
