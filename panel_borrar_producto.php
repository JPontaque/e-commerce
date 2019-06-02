<?php
session_start();
if (isset($_REQUEST["producto"]))
    $producto = $_REQUEST["producto"];
else
    $producto = 0;

require_once('includes/header.php');
require_once('includes/menu_panel.php');
require_once('bbdd/funciones_cifrado.php');
require_once('bbdd/funciones_bbdd.php');

$producto_modificar = buscar_producto($producto);
$_SESSION['producto_modificar'] = $producto_modificar['productoM'];
?>
    <head>
        <link rel="stylesheet" type="text/css" href="style/style.css">
        <script>
            $(function()
            {
                $("#btn_ajax").click(function(){
                    var url = "ajax/ajax_borrar_producto.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
                        success: function(data)
                        {
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
            <label for="musuario" class="col-4 col-form-label">Usuario a borrar</label>
            <div class="col-8">
                <input  id="musuario" name="musuario" placeholder="<?= openCypher('decrypt', base64_decode($producto_modificar['productoM'])) ?>" class="form-control here" type="text" readonly="readonly">
            </div>
        </div>
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
                <button name="submit" id="btn_ajax" type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </div>
    </form>
<?php
require_once('includes/cierre_panel.php');
require_once('includes/footer.php')
?>