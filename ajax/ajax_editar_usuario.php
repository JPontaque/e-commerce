<?php
session_start();

require_once('../bbdd/funciones_bbdd.php');
require_once ('../bbdd/funciones_cifrado.php');

$mensaje = null;

if (isset($_POST["ajax"])) {
    $password = $_POST["pass"];
    $password_new = $_POST["passN"];
    $password_new2 = $_POST["passN2"];
    $admin = $_POST["admin"];
    $loginn = null;

    if($password != '' && $password_new != '' && $password_new2 != ''){
        if(is_string($password) && is_string($password_new) && is_string($password_new2)){
            $password = filter_var($password, FILTER_SANITIZE_STRING);
            $password_new = filter_var($password_new, FILTER_SANITIZE_STRING);
            $password_new2 = filter_var($password_new2, FILTER_SANITIZE_STRING);

            $password = strip_tags(trim($password));
            $password_new = strip_tags(trim($password_new));
            $password_new2 = strip_tags(trim($password_new2));

            $loginn = logear($_SESSION['usuario_modificar']);
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
    else if($password_new == '')
    {
        $mensaje = "<script>document.getElementById('e_passwordN').innerHTML='El campo es requerido';</script>";
    }
    else if(strlen($password_new) < 6)
    {
        $mensaje = "<script>document.getElementById('e_passwordN').innerHTML='El minimo permitido 6 caracteres';</script>";
    }
    else if(strlen($password_new) > 32)
    {
        $mensaje = "<script>document.getElementById('e_passwordN').innerHTML='El maximo permitido 32 caracteres';</script>";
    }
    else if(password_verify($password_new, $loginn['contrasena']))
    {
        $mensaje = "<script>document.getElementById('e_passwordN').innerHTML='La nueva contraseña debe ser diferente a la actual';</script>";
    }
    else if($password_new2 == '')
    {
        $mensaje = "<script>document.getElementById('e_passwordN2').innerHTML='El campo es requerido';</script>";
    }
    else if($password_new2 != $password_new)
    {
        $mensaje = "<script>document.getElementById('e_passwordN2').innerHTML='La nueva contraseña no coincide';</script>";
    }
    else
    {
        $password_new = password_hash($password_new, PASSWORD_DEFAULT);
        contrasena_nueva($password_new, $_SESSION['usuario_modificar']);
        usuario_hacer_admin($admin, $_SESSION['usuario_modificar']);
        $mensaje = "<script>window.location='panel_control.php';</script>";
    }
}

echo $mensaje;