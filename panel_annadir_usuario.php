<?php
session_start();
if(isset($_SESSION['usuario'])) {
    if (isset($_SESSION['tiempo'])) {

        //Tiempo en segundos para dar vida a la sesión.
        $inactivo = 300;//5min en este caso.

        //Calculamos tiempo de vida inactivo.
        $vida_session = time() - $_SESSION['tiempo'];

        //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
        if ($vida_session > $inactivo) {
            header("Location: includes/logout.php");
        }

    }
    $_SESSION['tiempo'] = time();
} else {
    header("location:index.php");
}
require_once('includes/header.php');
require_once('includes/menu_panel.php');
?>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script src="jquery/jquery-3.3.1.min.js"></script>
        <script>
            $(function()
            {
                $("#btn_ajax").click(function(){
                    var url = "ajax/ajax_annadir_usuario.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
                        success: function(data)
                        {
                            $("#e_usuario").html('');
                            $("#e_password").html('');
                            $("#e_password2").html('');
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
            <label for="usernameN" class="col-4 col-form-label">Nuevo usuario</label>
            <div class="col-8">
                <input  id="usernameN" name="usernameN" placeholder="Nuevo usuario" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_usuario" style="text-align: center"></div>
        <div class="form-group row">
            <label for="passN" class="col-4 col-form-label">Nueva password</label>
            <div class="col-8">
                <input id="passN" name="passN" placeholder="Nueva contraseña" class="form-control here" type="password">
            </div>
        </div>
        <div class="error" id="e_password" style="text-align: center"></div>
        <div class="form-group row">
            <label for="passN2" class="col-4 col-form-label">Repetir nueva password</label>
            <div class="col-8">
                <input id="passN2" name="passN2" placeholder="Repetir nueva contraseña" class="form-control here" type="password">
            </div>
        </div>
        <div class="error" id="e_password2" style="text-align: center"></div>
        <div class="form-group row">
            <label for="emailN" class="col-4 col-form-label">Nuevo email</label>
            <div class="col-8">
                <input id="emailN" name="emailN" placeholder="Nuevo Email" class="form-control here" type="email">
            </div>
        </div>
        <div class="error" id="e_email" style="text-align: center"></div>
        <div class="form-group row">
            <label for="nombreN" class="col-4 col-form-label">Nuevo nombre</label>
            <div class="col-8">
                <input  id="nombreN" name="nombreN" placeholder="Nuevo nombre" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_nombre" style="text-align: center"></div>
        <div class="form-group row">
            <label for="apellidosN" class="col-4 col-form-label">Nuevos apellidos</label>
            <div class="col-8">
                <input  id="apellidosN" name="apellidosN" placeholder="Nuevos apellidos" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_apellidos" style="text-align: center"></div>
        <div class="form-group row">
            <label for="telefonoN" class="col-4 col-form-label">Nuevo telefono</label>
            <div class="col-8">
                <input  id="telefonoN" name="telefonoN" placeholder="Nuevo telefono" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_telefono" style="text-align: center"></div>
        <div class="form-group row">
            <label for="direccionN" class="col-4 col-form-label">Nueva direccion</label>
            <div class="col-8">
                <input  id="direccionN" name="direccionN" placeholder="Nueva direccion" class="form-control here" type="text">
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
                <button name="submit" id="btn_ajax" type="submit" class="btn btn-primary">Añadir</button>
            </div>
        </div>
    </form>
<?php
require_once('includes/cierre_panel.php');
require_once('includes/footer.php')
?>