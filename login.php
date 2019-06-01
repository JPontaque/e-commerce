<?php
require_once('includes/header.php');
?>
<head>
    <link rel="stylesheet" type="text/css" href="style/login.css">
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script>
        $(function()
        {
            $("#btn_ajax").click(function(){
                var url = "ajax/ajax_login.php"; // El script a dónde se realizará la petición.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#form_ajax").serialize(), // Adjuntar los campos del formulario enviado.
                    success: function(data)
                    {
                        $("#e_nombre").html('');
                        $("#e_password").html('');
                        $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
                    }
                });

                return false; // Evitar ejecutar el submit del formulario.
            });
        });
    </script>
</head>
<div class="container2">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Conectate</h3>
                <div id="mensaje"></div>
                <div class="d-flex justify-content-end social_icon">
                    <a href="https://github.com/JPontaque/e-commerce" target="_blank"><span><i class="fab fa-github"></i></span></a>
                    <a href="https://trello.com/b/SbwVLiCf/scrum-proyecto" target="_blank"><span><i class="fab fa-trello"></i></span></a>
                    <a href="https://www.linkedin.com/uas/login?_l=es" target="_blank"><span><i class="fab fa-linkedin"></i></span></a>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" id="form_ajax" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="username" name="username" required>

                    </div>
                    <div class="error" id="e_nombre"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="password" required>
                    </div>
                    <div class="error" id="e_password"></div>
                    <div class="form-group">
                        <input type="hidden" name="ajax">
                        <input type="submit" id="btn_ajax" value="Conectar" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    ¿No tienes cuenta?<a href="registrarse.php">Registrate <i class="fas fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('includes/footer.php');
?>