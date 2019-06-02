<?php
session_start();

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
                    var url = "ajax/ajax_annadir_producto.php"; // El script a dónde se realizará la petición.
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
                        success: function(data)
                        {
                            $("#e_producto").html('');
                            $("#e_descripcion").html('');
                            $("#e_src").html('');
                            $("#e_precio").html('');
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
            <label for="producto" class="col-4 col-form-label">Añadir producto</label>
            <div class="col-8">
                <input  id="producto" name="producto" placeholder="Añadir producto" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_producto" style="text-align: center"></div>
        <div class="form-group row">
            <label for="dproducto" class="col-4 col-form-label">Descripcion producto</label>
            <div class="col-8">
                <input  id="dproducto" name="dproducto" placeholder="Descripcion producto" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_descripcion" style="text-align: center"></div>
        <div class="form-group row">
            <label for="imagen" class="col-4 col-form-label">SRC imagen</label>
            <div class="col-8">
                <input id="imagen" name="imagen" placeholder="SRC imagen" class="form-control here" type="text">
            </div>
        </div>
        <div class="error" id="e_src" style="text-align: center"></div>
        <div class="form-group row">
            <label for="precio" class="col-4 col-form-label">Precio producto</label>
            <div class="col-8">
                <input id="precio" name="precio" placeholder="Precio producto" class="form-control here" type="number" min="1">
            </div>
        </div>
        <div class="error" id="e_precio" style="text-align: center"></div>
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