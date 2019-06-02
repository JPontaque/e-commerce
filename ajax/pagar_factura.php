<?php

session_start();

if (isset($_REQUEST["id"]))
    $id = $_REQUEST["id"];
else
    $id = 1;

require_once('../bbdd/funciones_cifrado.php');
require_once('../bbdd/funciones_bbdd.php');

$precio_total = suma_producto_carrito($_SESSION['usuario']);
$cantidad_productos = contar_productos_factura($_SESSION['usuario']);

$id = base64_encode(openCypher('encrypt', $id));

factura($_SESSION['usuario'], $cantidad_productos, $precio_total['precioT'], $id);
eliminar_producto_factura($_SESSION['usuario']);

header("location:../perfil_factura.php");