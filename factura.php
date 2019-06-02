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
require_once('bbdd/funciones_cifrado.php');
require_once('bbdd/funciones_bbdd.php');
require_once('bbdd/Db.php');

$precio_total = suma_producto_carrito($_SESSION['usuario']);
$id_factura = rand(0, getrandmax());
?>

    <div class="container">
        <br>
        <br>
        <br><br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">
                            <div class="col-md-6">
                                <img src="images/logo.png">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">#<?= $id_factura ?></p>
                                <p class="text-muted">
                                    <?php
                                    date_default_timezone_set("Europe/Madrid");
                                    echo date("d/m/Y") . " " . date("h:i:sa");
                                    ?>
                                </p>
                            </div>
                        </div>
                        <hr class="my-5">
                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Informacion del cliente</p>
                                <p class="mb-1"><?= openCypher('decrypt', base64_decode($_SESSION['apellidos'])) ?>, <?= openCypher('decrypt', base64_decode($_SESSION['nombre'])) ?></p>
                                <p><?= openCypher('decrypt', base64_decode($_SESSION['telefono'])) ?></p>
                                <p class="mb-1">España, Europa</p>
                                <p class="mb-1"><?= openCypher('decrypt', base64_decode($_SESSION['direccion'])) ?></p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Detalles Empresa</p>
                                <p class="mb-1"><span class="text-muted">Telefono: </span> +34 976341287</p>
                                <p class="mb-1"><span class="text-muted">Empresa ID: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> PayPal</p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold"></th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Producto</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Disponible</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Cantidad</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Precio</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $bbdd = new Db();
                                    $usuario_actual = $_SESSION['usuario'];
                                    $sql = 'SELECT * FROM carritos WHERE CONVERT(usuario,BINARY) = CONVERT(?,BINARY)';
                                    $parametros = array($usuario_actual);
                                    $consulta = $bbdd->lanzar_consulta($sql, $parametros);

                                    while($fila = $consulta->fetch_row()){
                                        ?>
                                        <tr>
                                            <td><img src="productos/<?= openCypher('decrypt', base64_decode($fila[4])) ?>" width="45px" height="45px"/></td>
                                            <td><?= openCypher('decrypt', base64_decode($fila[2])) ?></td>
                                            <td>In Stock</td>
                                            <td>1</td>
                                            <td><?= $fila[3] ?> €</td>
                                        </tr>
                                        <?php
                                    }

                                    $bbdd->desconectar();
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <a href="ajax/pagar_factura.php?id=<?= $id_factura ?>" style="text-decoration: none">
                                    <button class="btn btn-lg btn-block btn-success text-uppercase">Pagar</button>
                                </a>
                            </div>
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Precio Total</div>
                                <div class="h2 font-weight-light"><?= $precio_total['precioT'] ?> €</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </div>

<?php
require_once('includes/footer.php')
?>