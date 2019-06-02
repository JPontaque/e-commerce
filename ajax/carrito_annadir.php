<?php
session_start();
if (isset($_REQUEST["producto"]))
    $producto = $_REQUEST["producto"];
else
    $producto = 0;

require_once('../bbdd/funciones_bbdd.php');

$producto_carrito = buscar_producto($producto);
producto_carrito_annadir($_SESSION['usuario'], $producto_carrito['productoM'], $producto_carrito['productoP'], $producto_carrito['productoF']);

header("location:../carrito.php");