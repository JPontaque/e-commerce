<?php
session_start();

require_once('../bbdd/funciones_bbdd.php');
require_once ('../bbdd/funciones_cifrado.php');

$mensaje = null;

if (isset($_POST["ajax"])) {
    $password = $_POST["pass"];

    if($password != ''){
        if(is_string($password)){
            $password = filter_var($password, FILTER_SANITIZE_STRING);
            $password = strip_tags(trim($password));
        }
    }

    if ($password == '')
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($password) < 6)
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='El minimo permitido 6 caracteres';</script>";
    }
    else if(strlen($password) > 32)
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='El maximo permitido 32 caracteres';</script>";
    }
    else if(!password_verify($password, $_SESSION['contrasena']))
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='No coincide la contraseña actual';</script>";
    }
    else
    {
        eliminar_producto($_SESSION['producto_modificar']);
        $mensaje = "<script>window.location='panel_producto.php';</script>";
    }
}

echo $mensaje;