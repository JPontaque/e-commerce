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
                <th scope="col">Fecha de pago</th>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Cantidad productos</th>
                <th scope="col">Precio total</th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            <?php
            $bbdd = new Db();
            $sql = 'SELECT * FROM facturas';
            $consulta = $bbdd->lanzar_consulta($sql);

            while($fila = $consulta->fetch_row()){
                ?>
                <tr>
                    <td><?= $fila[4] ?></td>
                    <td><?= $fila[3] ?></td>
                    <td><?= $fila[0] ?></td>
                    <td style="text-align: center"><?= $fila[1] ?></td>
                    <td><?= $fila[2] ?> €</td>
                </tr>
                <?php
            }

            $bbdd->desconectar();
            ?>
            </tbody>
        </table>
    </div>
<?php
require_once('includes/cierre_panel.php');
require_once('includes/footer.php')
?>