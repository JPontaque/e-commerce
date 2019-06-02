<?php
session_start();
if(isset($_SESSION['usuario'])) {
    if (isset($_SESSION['tiempo'])) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 300;//5min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if ($vida_session > $inactivo) {
            header("Location: includes/logout.php");
        }

    }
    $_SESSION['tiempo'] = time();
} else {
    header("location:index.php");
}
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
                    <td><?= $fila[5] ?></td>
                    <td><?= openCypher('decrypt', base64_decode($fila[4])) ?></td>
                    <td><?= openCypher('decrypt', base64_decode($fila[1])) ?></td>
                    <td style="text-align: center"><?= $fila[2] ?></td>
                    <td><?= $fila[3] ?> €</td>
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