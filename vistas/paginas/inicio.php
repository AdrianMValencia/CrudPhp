<?php
if (!isset($_SESSION['validarIngreso'])) {
    echo '<script>window.location = "index.php?pagina=ingreso";</script>';
    return;
} else {
    if ($_SESSION['validarIngreso'] != 'ok') {
        echo '<script>window.location = "index.php?pagina=ingreso";</script>';
        return;
    }
}
$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>NOMBRES</th>
            <th>EMAIL</th>
            <th>FECHA</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $key => $value) : ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['nombre']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['fecha']; ?></td>
                <td>
                    <div class="btn btn-group">
                        <div class="px-1">
                            <a href="index.php?pagina=editar&id=<?php echo $value['id']; ?>" class="btn btn-warning"><i class="fas fa-pencil"></i></a>
                        </div>
                    </div>
                    <form method="POST">
                        <input type="hidden" value="<?php echo $value['id']; ?>" name="eliminarRegistro" />
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar->ctrEliminarRegistro();
                            ?>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>