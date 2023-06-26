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
                            <?php if (1 > 0) /*($_SESSION['usuarioRol'] === 'admin')*/ : ?>
                                <tr>
                                    <th>Id</th>
                                    <th>Libro</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                </tr>
                            <?php else : ?>
                                <tr>
                                    <th>Id</th>
                                    <th>Libro</th>
                                    <th>Estado</th>
                                </tr>
                            <?php endif; ?>
                        </thead>
                        <tbody>
                            <?php foreach ($this->prestamo->Listar() as $p) : ?>
                                <tr style="background-color: <?php echo $p->estado === 'Devuelto' ? '#f2f2f2' : '#c8e6c8'; ?>">
                                    <td><?= $p->id ?></td>
                                    <td><?= $p->Libro ?></td>
                                    <?php if (1 > 0) /*($_SESSION['usuarioRol'] === 'admin')*/ : ?>
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
