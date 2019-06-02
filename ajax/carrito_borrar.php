<?php
session_start();
if (isset($_REQUEST["producto"]))
    $producto = $_REQUEST["producto"];
else
    $producto = "";

require_once('../bbdd/funciones_bbdd.php');

eliminar_producto_usuario($_SESSION['usuario'], $producto);

header("location:../carrito.php");