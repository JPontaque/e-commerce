<?php
session_start();

require_once('../bbdd/funciones_bbdd.php');
require_once ('../bbdd/funciones_cifrado.php');

$mensaje = null;

if (isset($_POST["ajax"])) {
    $producto = $_POST["producto"];
    $descripcion = $_POST["dproducto"];
    $imagen = $_POST["imagen"];
    $precio = $_POST["precio"];
    $passwordA = $_POST["pass"];
    $repetido = null;
    $producto_copia = null;

    if($producto != '' && $descripcion != '' && $imagen != '' && $precio != ''){
        if(is_string($producto) && is_string($descripcion) && is_string($imagen)){
            $producto = filter_var($producto, FILTER_SANITIZE_STRING);
            $descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);
            $imagen = filter_var($imagen, FILTER_SANITIZE_STRING);

            $producto = strip_tags(trim($producto));
            $descripcion = strip_tags(trim($descripcion));
            $imagen = strip_tags(trim($imagen));

            $producto_copia = $producto;
            $producto_copia = base64_encode(openCypher('encrypt', $producto_copia));

            $repetido = producto_unico($producto_copia);
        }
    }

    if ($producto == '')
    {
        $mensaje = "<script>document.getElementById('e_producto').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($producto) < 2)
    {
        $mensaje = "<script>document.getElementById('e_producto').innerHTML='El minimo permitido 2 caracteres';</script>";
    }
    else if(strlen($producto) > 75)
    {
        $mensaje = "<script>document.getElementById('e_producto').innerHTML='El maximo permitido 75 caracteres';</script>";
    }
    else if(!$repetido['registro'])
    {
        $mensaje = "<script>document.getElementById('e_producto').innerHTML='El producto ya existe';</script>";
    }
    else if ($descripcion == '')
    {
        $mensaje = "<script>document.getElementById('e_descripcion').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($descripcion) < 4)
    {
        $mensaje = "<script>document.getElementById('e_descripcion').innerHTML='El minimo permitido 4 caracteres';</script>";
    }
    else if(strlen($descripcion) > 200)
    {
        $mensaje = "<script>document.getElementById('e_descripcion').innerHTML='El maximo permitido 200 caracteres';</script>";
    }
    else if ($imagen == '')
    {
        $mensaje = "<script>document.getElementById('e_src').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($imagen) < 2)
    {
        $mensaje = "<script>document.getElementById('e_src').innerHTML='El minimo permitido 2 caracteres';</script>";
    }
    else if(strlen($imagen) > 50)
    {
        $mensaje = "<script>document.getElementById('e_src').innerHTML='El maximo permitido 50 caracteres';</script>";
    }
    else if($precio == '')
    {
        $mensaje = "<script>document.getElementById('e_precio').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($precio) < 1)
    {
        $mensaje = "<script>document.getElementById('e_precio').innerHTML='El minimo permitido 1 caracter';</script>";
    }
    else if(strlen($precio) > 50)
    {
        $mensaje = "<script>document.getElementById('e_precio').innerHTML='El maximo permitido 50 caracteres';</script>";
    }
    else if ($passwordA == '')
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($passwordA) < 6)
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='El minimo permitido 6 caracteres';</script>";
    }
    else if(strlen($passwordA) > 32)
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='El maximo permitido 32 caracteres';</script>";
    }
    else if(!password_verify($passwordA, $_SESSION['contrasena']))
    {
        $mensaje = "<script>document.getElementById('e_passwordA').innerHTML='No coincide la contraseña actual';</script>";
    }
    else
    {
        $descripcion = base64_encode(openCypher('encrypt', $descripcion));
        $imagen = base64_encode(openCypher('encrypt', $imagen));

        insertar_producto($producto_copia, $descripcion, $imagen, $precio);
        $mensaje = "<script>window.location='panel_producto.php';</script>";
    }
}

echo $mensaje;