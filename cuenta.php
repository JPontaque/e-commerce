<?php
session_start();
require_once('includes/header.php');
require_once('includes/menu_perfil.php');
require_once('bbdd/funciones_cifrado.php');
?>

<form>
    <div class="form-group row">
        <label for="username" class="col-4 col-form-label">Usuario</label>
        <div class="col-8">
            <input readonly="readonly"  id="username" name="username" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['usuario'])) ?>" class="form-control here" required="required" type="text">
        </div>
    </div>
    <div class="form-group row">
        <label for="newpass" class="col-4 col-form-label">Password</label>
        <div class="col-8">
            <input readonly="readonly" id="newpass" name="newpass" placeholder="********" class="form-control here" type="password">
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-4 col-form-label">Email</label>
        <div class="col-8">
            <input readonly="readonly" id="email" name="email" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['email'])) ?>" class="form-control here" required="required" type="email">
        </div>
    </div>
    <div class="form-group row">
        <label for="fecha" class="col-4 col-form-label">Fecha de registro</label>
        <div class="col-8">
            <input readonly="readonly" id="fecha" name="fecha" placeholder="<?= $_SESSION['fecha_registro'] ?>" class="form-control here" required="required" type="text">
        </div>
    </div>
    <div class="form-group row">
        <label for="nombre" class="col-4 col-form-label">Nombre</label>
        <div class="col-8">
            <input readonly="readonly"  id="nombre" name="nombre" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['nombre'])) ?>" class="form-control here" required="required" type="text">
        </div>
    </div>
    <div class="form-group row">
        <label for="apellidos" class="col-4 col-form-label">Apellidos</label>
        <div class="col-8">
            <input readonly="readonly"  id="apellidos" name="apellidos" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['apellidos'])) ?>" class="form-control here" required="required" type="text">
        </div>
    </div>
    <div class="form-group row">
        <label for="telefono" class="col-4 col-form-label">Telefono</label>
        <div class="col-8">
            <input readonly="readonly"  id="telefono" name="telefono" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['telefono'])) ?>" class="form-control here" required="required" type="text">
        </div>
    </div>
    <div class="form-group row">
        <label for="direccion" class="col-4 col-form-label">Direccion</label>
        <div class="col-8">
            <input readonly="readonly"  id="direccion" name="direccion" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['direccion'])) ?>" class="form-control here" required="required" type="text">
        </div>
    </div>
</form>

<?php
require_once('includes/cierre_perfil.php');
require_once('includes/footer.php');
?>
