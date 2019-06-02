<?php
if (isset($_REQUEST["pagina"]))
    $pagina = $_REQUEST["pagina"];
else
    $pagina = 1;

session_start();

require_once('includes/header.php');
require_once('bbdd/funciones_cifrado.php');
require_once('bbdd/funciones_bbdd.php');
require_once('bbdd/Db.php');
$numero_fotos = get_cantidad_productos();
$numero_paginas = ceil($numero_fotos / CANTIDAD_PRODUCTOS);
?>

<div class="container">
    <br>
    <br>
    <br>
    <br>
    <?php
    require('includes/paginador.php');
    ?>
    <br>
    <div class="card-group">
        <?php
        $bbdd = new Db();
        $sql = 'SELECT * FROM productos LIMIT ' . ($pagina - 1) * CANTIDAD_PRODUCTOS . ', ' . CANTIDAD_PRODUCTOS;
        $consulta = $bbdd->lanzar_consulta($sql);

        while($fila = $consulta->fetch_row()){
            ?>
            <div class="card">
                <img class="card-img-top" src="<?=PATH_IMAGENES . openCypher('decrypt', base64_decode($fila[3]))?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?= openCypher('decrypt', base64_decode($fila[1])) ?></h5>
                    <p class="card-text"><?= openCypher('decrypt', base64_decode($fila[2])) ?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><b>$<?= $fila[4] ?></b></small><a href="carrito_annadir.php?producto=<?= $fila[0] ?>" style="text-decoration: none; float: right"><button class="btn btn-success">Añadir</button></a>
                </div>
            </div>
            <?php
        }

        $bbdd->desconectar();
        ?>
    </div>
    <br>
    <br>
    <?php
    require('includes/paginador.php');
    ?>
    <br>
    <br>
    <br>
</div>


<?php
require_once('includes/footer.php');
?>
