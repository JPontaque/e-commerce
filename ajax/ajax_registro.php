<?php

require_once('../bbdd/funciones_bbdd.php');
require_once ('../bbdd/funciones_cifrado.php');

$mensaje = null;

if (isset($_POST["ajax"])) {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = $_POST["contrasena"];
    $repetir_password = $_POST["contrasena2"];
    $nombree = $_POST["nombree"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $repetido = usuario_unico($nombre);
/*
    if($nombre != '' && $email != '' && $password != '' && $repetir_password != '' && $nombree != '' && $apellidos != '' && $telefono != '' &&
        $direccion != ''){
        if(is_string($nombre) && is_string($password) && is_string($repetir_password) && is_string($email) && is_string($nombree) && is_string($apellidos)
            && is_string($direccion) && is_string($telefono)){
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            $password = filter_var($password, FILTER_SANITIZE_STRING);
            $nombree = filter_var($nombree, FILTER_SANITIZE_STRING);
            $apellidos = filter_var($apellidos, FILTER_SANITIZE_STRING);
            $repetir_password = filter_var($repetir_password, FILTER_SANITIZE_STRING);
            $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
            $direccion = filter_var($direccion, FILTER_SANITIZE_STRING);
            $email = filter_var($email, FILTER_SANITIZE_STRING);

            $nombre = strip_tags(trim($nombre));
            $password = strip_tags(trim($password));
            $nombree = strip_tags(trim($nombree));
            $apellidos = strip_tags(trim($apellidos));
            $telefono = strip_tags(trim($telefono));
            $repetir_password = strip_tags(trim($repetir_password));
            $direccion = strip_tags(trim($direccion));
            $email = strip_tags(trim($email));

            $nombre = base64_encode(openCypher('encrypt', $nombre));
            if($repetir_password == $password){
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            $nombree = base64_encode(openCypher('encrypt', $nombree));
            $apellidos = base64_encode(openCypher('encrypt', $apellidos));
            $telefono = base64_encode(openCypher('encrypt', $telefono));
            $direccion = base64_encode(openCypher('encrypt', $direccion));
            $email = base64_encode(openCypher('encrypt', $email));

            $repetido = usuario_unico($nombre);
        }
    }
*/
    if ($nombre == '')
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombre))
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Error, solo se permiten letras';</script>";
    }
    else if(strlen($nombre) < 2)
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El minimo permitido 2 caracteres';</script>";
    }
    else if(strlen($nombre) > 50)
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El maximo permitido 50 caracteres';</script>";
    }
    else if(!$repetido['registro'])
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El usuario ya existe';</script>";
    }
    else if ($password == '')
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $password))
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Obligatorio, letras y numeros';</script>";
    }
    else if(strlen($password) < 6)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El minimo permitido 6 caracteres';</script>";
    }
    else if(strlen($password) > 32)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El maximo permitido 32 caracteres';</script>";
    }
    else if ($repetir_password == ''){
        $mensaje = "<script>document.getElementById('e_password2').innerHTML='El campo es requerido';</script>";
    }
    else if ($repetir_password != $password)
    {
        $mensaje = "<script>document.getElementById('e_password2').innerHTML='Las contraseñas no coinciden';</script>";
    }
    else if ($email == '')
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/', $email))
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='Error, formato de email incorrecto';</script>";
    }
    else if(strlen($email) < 8)
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El minimo permitido 8 caracteres';</script>";
    }
    else if(strlen($email) > 80)
    {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El maximo permitido 50 caracteres';</script>";
    }
    else if($nombree == '')
    {
        $mensaje = "<script>document.getElementById('e_nombree').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nombree))
    {
        $mensaje = "<script>document.getElementById('e_nombree').innerHTML='Error, solo se permiten letras';</script>";
    }
    else if(strlen($nombree) < 2)
    {
        $mensaje = "<script>document.getElementById('e_nombree').innerHTML='El minimo permitido 2 caracteres';</script>";
    }
    else if(strlen($nombree) > 50)
    {
        $mensaje = "<script>document.getElementById('e_nombree').innerHTML='El maximo permitido 50 caracteres';</script>";
    }
    else if($apellidos == '')
    {
        $mensaje = "<script>document.getElementById('e_apellidos').innerHTML='El campo es requerido';</script>";
    }
    else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $apellidos))
    {
        $mensaje = "<script>document.getElementById('e_apellidos').innerHTML='Error, solo se permiten letras';</script>";
    }
    else if(strlen($apellidos) < 2)
    {
        $mensaje = "<script>document.getElementById('e_apellidos').innerHTML='El minimo permitido 2 caracteres';</script>";
    }
    else if(strlen($apellidos) > 50)
    {
        $mensaje = "<script>document.getElementById('e_apellidos').innerHTML='El maximo permitido 50 caracteres';</script>";
    }
    else if($telefono == '')
    {
        $mensaje = "<script>document.getElementById('e_telefono').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($telefono) != 9)
    {
        $mensaje = "<script>document.getElementById('e_telefono').innerHTML='El telefono tiene que ser de 9 digitos';</script>";
    }
    else if(!preg_match('/^[9|6|7][0-9]{8}$/', $telefono))
    {
        $mensaje = "<script>document.getElementById('e_telefono').innerHTML='Error, solo se permiten numeros';</script>";
    }

    else if($direccion == '')
    {
        $mensaje = "<script>document.getElementById('e_direccion').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($direccion) < 5)
    {
        $mensaje = "<script>document.getElementById('e_direccion').innerHTML='El minimo permitido 5 caracteres';</script>";
    }
    else if(strlen($direccion) > 100)
    {
        $mensaje = "<script>document.getElementById('e_direccion').innerHTML='El maximo permitido 100 caracteres';</script>";
    }
    else
    {
        insertar_usuario($nombre, $password, $nombree, $apellidos, $email, $telefono, $direccion);
        $mensaje = "<script>window.location='../../login.php';</script>";
    }
}

echo $mensaje;