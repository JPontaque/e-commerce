<?php
require_once('bbdd/funciones_cifrado.php');
?>
<div class="container">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group ">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/panel_control.php' || $_SERVER["PHP_SELF"] == '/e-commerce/panel_annadir_usuario.php'
                        || $_SERVER["PHP_SELF"] == '/e-commerce/panel_borrar_usuario.php' || $_SERVER["PHP_SELF"] == '/e-commerce/panel_editar_usuario.php'){
                        ?><a href="panel_control.php" class="list-group-item list-group-item-action active">Gestionar usuarios</a>
                        <?php
                    } else {
                        ?>
                        <a href="panel_control.php" class="list-group-item list-group-item-action">Gestionar usuarios</a>
                        <?php
                    }
                    ?>
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/panel_producto.php' || $_SERVER["PHP_SELF"] == '/e-commerce/panel_annadir_producto.php'
                        || $_SERVER["PHP_SELF"] == '/e-commerce/panel_borrar_producto.php' || $_SERVER["PHP_SELF"] == '/e-commerce/panel_editar_producto.php'){
                        ?><a href="panel_producto.php" class="list-group-item list-group-item-action active">Gestionar productos</a>
                        <?php
                    } else {
                        ?>
                        <a href="panel_producto.php" class="list-group-item list-group-item-action">Gestionar productos</a>
                        <?php
                    }
                    ?>
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/panel_facturas.php'){
                        ?><a href="panel_facturas.php" class="list-group-item list-group-item-action active">Facturas totales</a>
                        <?php
                    } else {
                        ?>
                        <a href="panel_facturas.php" class="list-group-item list-group-item-action">Facturas totales</a>
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
                                <div class="container mb-4">
                                    <div class="row">
                                        <div class="col-12">