<?php
session_start();
require_once('includes/header.php');
require_once('includes/menu_panel.php');
require_once('bbdd/funciones_cifrado.php');
require_once('bbdd/Db.php');
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Fecha registro</th>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Administrador</th>
            <th scope="col">Eliminar / Editar</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        <?php
        $bbdd = new Db();
        $sql = 'SELECT * FROM usuarios';
        $consulta = $bbdd->lanzar_consulta($sql);

        while($fila = $consulta->fetch_row()){
            ?>
            <tr>
                <td><?= $fila[8] ?></td>
                <td><?= $fila[0] ?></td>
                <td><?= openCypher('decrypt', base64_decode($fila[1])) ?></td>
                <td><?= $fila[9] ?></td>
                <td style="text-align: center">
                    <a href="panel_borrar_usuario.php?usuario=<?= $fila[0] ?>" style="text-decoration: none"><button id="<?= $fila[0] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a>
                    <a href="panel_editar_usuario.php?usuario=<?= $fila[0] ?>" style="text-decoration: none"><button id="<?= $fila[0] ?>" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></button></a>
                </td>
            </tr>
            <?php
        }

        $bbdd->desconectar();
        ?>
        </tbody>
    </table>
    <div class="form-group row" style="text-align: right">
        <div class="offset-4 col-8">
            <a href="panel_annadir_usuario.php"><button name="submit" type="submit" class="btn btn-primary">Añadir Usuario</button></a>
        </div>
    </div>
</div>

<?php
require_once('includes/cierre_panel.php');
require_once('includes/footer.php');
?>
