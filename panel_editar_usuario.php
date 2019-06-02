<?php
session_start();
if (isset($_REQUEST["usuario"]))
    $usuario = $_REQUEST["usuario"];
else
    $usuario = 0;

require_once('includes/header.php');
require_once('includes/menu_panel.php');
require_once('bbdd/funciones_cifrado.php');
require_once('bbdd/funciones_bbdd.php');

$usuario_modificar = buscar_usuario($usuario);
$_SESSION['usuario_modificar'] = $usuario_modificar['usuarioM'];
?>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script>
            $(function()
            {
                $("#btn_ajax").click(function(){
                    var url = "ajax/ajax_editar_usuario.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
                        success: function(data)
                        {
                            $("#e_passwordA").html('');
                            $("#e_passwordN").html('');
                            $("#e_passwordN2").html('');
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
            <label for="musuario" class="col-4 col-form-label">Usuario a modificar</label>
            <div class="col-8">
                <input  id="musuario" name="musuario" placeholder="<?= openCypher('decrypt', base64_decode($usuario_modificar['usuarioM'])) ?>" class="form-control here" type="text" readonly="readonly">
            </div>
        </div>
        <div class="form-group row">
            <label for="pass" class="col-4 col-form-label">Contraseña actual</label>
            <div class="col-8">
                <input id="pass" name="pass" placeholder="Contraseña actual" class="form-control here" type="password">
            </div>
        </div>
        <div class="error" id="e_passwordA" style="text-align: center"></div>
        <div class="form-group row">
            <label for="passN" class="col-4 col-form-label">Nueva password</label>
            <div class="col-8">
                <input id="passN" name="passN" placeholder="Nueva contraseña" class="form-control here" type="password">
            </div>
        </div>
        <div class="error" id="e_passwordN" style="text-align: center"></div>
        <div class="form-group row">
            <label for="passN2" class="col-4 col-form-label">Repetir nueva password</label>
            <div class="col-8">
                <input id="passN2" name="passN2" placeholder="Repetir nueva contraseña" class="form-control here" type="password">
            </div>
        </div>
        <div class="error" id="e_passwordN2" style="text-align: center"></div>
        <div class="form-group row">
            <label for="adminn" class="col-4 col-form-label">Administrador</label>
            <div class="col-8">
                <div><input type="radio" name="admin" value="No" checked> No <input type="radio" name="admin" value="Si"> Si</div>
            </div>
        </div>
        <br>
        <div class="form-group row" style="text-align: right">
            <div class="offset-4 col-8">
                <input type="hidden" name="ajax">
                <button name="submit" id="btn_ajax" type="submit" class="btn btn-primary">Cambiar</button>
            </div>
        </div>
    </form>
<?php
require_once('includes/cierre_panel.php');
require_once('includes/footer.php')
?>