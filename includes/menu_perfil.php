<?php
require_once('bbdd/funciones_cifrado.php');
?>
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <?php
                if($_SERVER["PHP_SELF"] == '/e-commerce/cuenta.php'){
                    ?><a href="cuenta.php" class="list-group-item list-group-item-action active">Perfil</a>
                    <?php
                } else {
                    ?>
                    <a href="cuenta.php" class="list-group-item list-group-item-action">Perfil</a>
                    <?php
                }
                ?>
                <?php
                if($_SERVER["PHP_SELF"] == '/e-commerce/perfil_datos_personales.php'){
                    ?><a href="perfil_datos_personales.php" class="list-group-item list-group-item-action active">Cambiar datos</a>
                    <?php
                } else {
                    ?>
                    <a href="perfil_datos_personales.php" class="list-group-item list-group-item-action">Cambiar datos</a>
                    <?php
                }
                ?>
                <?php
                if($_SERVER["PHP_SELF"] == '/e-commerce/perfil_datos_privados.php'){
                    ?><a href="perfil_datos_privados.php" class="list-group-item list-group-item-action active">Cambiar contraseña</a>
                    <?php
                } else {
                    ?>
                    <a href="perfil_datos_privados.php" class="list-group-item list-group-item-action">Cambiar contraseña</a>
                    <?php
                }
                ?>
                <?php
                if($_SERVER["PHP_SELF"] == '/e-commerce/perfil_baja.php'){
                    ?><a href="perfil_baja.php" class="list-group-item list-group-item-action active">Darse de baja</a>
                    <?php
                } else {
                    ?>
                    <a href="perfil_baja.php" class="list-group-item list-group-item-action">Darse de baja</a>
                    <?php
                }
                ?>
                <?php
                if($_SERVER["PHP_SELF"] == '/e-commerce/perfil_factura.php'){
                    ?><a href="perfil_factura.php" class="list-group-item list-group-item-action active">Facturas</a>
                    <?php
                } else {
                    ?>
                    <a href="perfil_factura.php" class="list-group-item list-group-item-action">Facturas</a>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4><?= openCypher('decrypt', base64_decode($_SESSION['usuario'])) ?></h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">