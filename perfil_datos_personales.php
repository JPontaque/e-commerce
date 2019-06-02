<?php
session_start();

require_once('includes/header.php');
require_once('includes/menu_perfil.php');
require_once('bbdd/funciones_cifrado.php');
?>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script>
            $(function()
            {
                $("#btn_ajax").click(function(){
                    var url = "ajax/ajax_datos_personales.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
                        success: function(data)
                        {
                            $("#e_usuario").html('');
                            $("#e_email").html('');
                            $("#e_nombre").html('');
                            $("#e_apellidos").html('');
                            $("#e_telefono").html('');
                            $("#e_direccion").html('');
                            $("#e_passwordA").html('');
                            $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
                        }
                    });

                    return false; // Evitar ejecutar el submit del formulario.
                });
            });
        </script>
    </head>
    <div id="mensaje"></div>
    <form method="POST" id="form_ajax" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div class="form-group row">
            <label for="username" class="col-4 col-form-label">Usuario</label>
            <div class="col-8">
                <input readonly="readonly"  id="username" name="username" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['usuario'])) ?>" class="form-control here" required="required" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="usernameN" class="col-4 col-form-label">Nuevo usuario</label>
            <div class="col-8">
                <input  id="usernameN" name="usernameN" placeholder="Nuevo usuario" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_usuario" style="text-align: center"></div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label>
            <div class="col-8">
                <input readonly="readonly" id="email" name="email" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['email'])) ?>" class="form-control here" required="required" type="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="emailN" class="col-4 col-form-label">Nuevo email</label>
            <div class="col-8">
                <input id="emailN" name="emailN" placeholder="Nuevo Email" class="form-control here" type="email">
            </div>
        </div>
        <div class="error" id="e_email" style="text-align: center"></div>
        <div class="form-group row">
            <label for="nombre" class="col-4 col-form-label">Nombre</label>
            <div class="col-8">
                <input readonly="readonly" id="nombre" name="nombre" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['nombre'])) ?>" class="form-control here" required="required" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="nombreN" class="col-4 col-form-label">Nuevo nombre</label>
            <div class="col-8">
                <input id="nombreN" name="nombreN" placeholder="Nuevo Nombre" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_nombre" style="text-align: center"></div>
        <div class="form-group row">
            <label for="apellidos" class="col-4 col-form-label">Apellidos</label>
            <div class="col-8">
                <input readonly="readonly" id="apellidos" name="apellidos" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['apellidos'])) ?>" class="form-control here" required="required" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="apellidosN" class="col-4 col-form-label">Nuevos apellidos</label>
            <div class="col-8">
                <input id="apellidosN" name="apellidosN" placeholder="Nuevos Apellidos" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_apellidos" style="text-align: center"></div>
        <div class="form-group row">
            <label for="telefono" class="col-4 col-form-label">Telefono</label>
            <div class="col-8">
                <input readonly="readonly" id="telefono" name="telefono" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['telefono'])) ?>" class="form-control here" required="required" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="telefonoN" class="col-4 col-form-label">Nuevo telefono</label>
            <div class="col-8">
                <input id="telefonoN" name="telefonoN" placeholder="Nuevo Telefono" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_telefono" style="text-align: center"></div>
        <div class="form-group row">
            <label for="direccion" class="col-4 col-form-label">Direccion</label>
            <div class="col-8">
                <input readonly="readonly" id="direccion" name="direccion" placeholder="<?= openCypher('decrypt', base64_decode($_SESSION['direccion'])) ?>" class="form-control here" required="required" type="text">
            </div>
        </div>
        <div class="form-group row">
            <label for="direccionN" class="col-4 col-form-label">Nueva direccion</label>
            <div class="col-8">
                <input id="direccionN" name="direccionN" placeholder="Nueva Direccion" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_direccion" style="text-align: center"></div>
        <div class="form-group row">
            <label for="pass" class="col-4 col-form-label">Contraseña actual</label>
            <div class="col-8">
                <input id="pass" name="pass" placeholder="Contraseña actual" class="form-control here" type="password">
            </div>
        </div>
        <div class="error" id="e_passwordA" style="text-align: center"></div>
        <br>
        <div class="form-group row" style="text-align: right">
            <div class="offset-4 col-8">
                <input type="hidden" name="ajax">
                <button name="submit" id="btn_ajax" type="submit" class="btn btn-primary">Cambiar</button>
            </div>
        </div>
    </form>
<?php
require_once('includes/cierre_perfil.php');
require_once('includes/footer.php')
?>