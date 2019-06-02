<?php


session_start();

require_once('../bbdd/funciones_bbdd.php');
require_once ('../bbdd/funciones_cifrado.php');

$mensaje = null;

if (isset($_POST["ajax"])) {
    $nombre = $_POST["username"];
    $password = $_POST["password"];
    $repetido = null;
    $login = null;
    $nombre_copia = null;

    if($nombre != '' && $password != ''){
        if(is_string($nombre) && is_string($password)) {
            $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
            $password = filter_var($password, FILTER_SANITIZE_STRING);

            $nombre = strip_tags(trim($nombre));
            $password = strip_tags(trim($password));

            $nombre_copia = $nombre;

            $nombre_copia = base64_encode(openCypher('encrypt', $nombre_copia));

            $repetido = usuario_unico($nombre_copia);
            $login = logear($nombre_copia);
        } else {
            $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Algo no anda bien con lo escrito...';</script>";
        }
    }

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
    else if($repetido['registro'])
    {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El usuario no existe';</script>";
    }
    else if ($password == '')
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($password) < 6)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El minimo permitido 6 caracteres';</script>";
    }
    else if(strlen($password) > 32)
    {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='El maximo permitido 32 caracteres';</script>";
    }
    else if (!password_verify($password, $login['contrasena'])){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='La contraseña es erronea';</script>";
    }
    else
    {
        $_SESSION['login'] = $login['login'];
        $_SESSION['usuario'] = $login['usuario'];
        $_SESSION['contrasena'] = $login['contrasena'];
        $_SESSION['email'] = $login['email'];
        $_SESSION['fecha_registro'] = $login['fecha_registro'];
        $_SESSION['is_admin'] = $login['is_admin'];
        $_SESSION['nombre'] = $login['nombre'];
        $_SESSION['apellidos'] = $login['apellidos'];
        $_SESSION['telefono'] = $login['telefono'];
        $_SESSION['direccion'] = $login['direccion'];
        $mensaje = "<script>window.location='index.php';</script>";
    }
}

echo $mensaje;
