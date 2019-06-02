<?php
session_start();

require_once('includes/header.php');
require_once('bbdd/funciones_bbdd.php');
require_once('bbdd/Db.php');

$precio_total = suma_producto_carrito($_SESSION['usuario']);
?>

<br><br>
<div class="container mb-4">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col">Producto</th>
                        <th scope="col">Disponible</th>
                        <th scope="col" class="text-center">Cantidad</th>
                        <th scope="col" class="text-right">Precio</th>
                        <th> </th>
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
                            <td><img src="imagenes/<?= $fila[3] ?>" width="45px" height="45px"/></td>
                            <td><?= $fila[1] ?></td>
                            <td>In Stock</td>
                            <td style="text-align: center">1</td>
                            <td class="text-right"><?= $fila[2] ?> €</td>
                            <td class="text-right"><a href="carrito_borrar_producto.php?producto=<?= $fila[4] ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></a></td>
                        </tr>
                        <?php
                    }

                    $bbdd->desconectar();
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><strong><?= $precio_total['precioT'] ?> €</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="tienda.php" style="text-decoration: none"><button class="btn btn-lg btn-block btn-light" style="border: 1px solid black">Continuar comprando</button></a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <?php if(contar_productos_factura($_SESSION['usuario']) != 0){ ?>
                        <a href="factura.php" style="text-decoration: none"><button class="btn btn-lg btn-block btn-success text-uppercase">Comprar</button></a>
                    <?php } else { ?>
                        <a href="factura.php" style="text-decoration: none"><button class="btn btn-lg btn-block btn-success text-uppercase" disabled>Comprar</button></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>

<?php
require_once('includes/footer.php');
?>
