<?php
require_once('includes/header.php');
?>
<head>
    <link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<div class="separador2"></div>
<div class="container2">
    <div class="d-flex justify-content-center h-100">
        <div class="card-2" style="height: 610px; border-radius: .25rem; ">
            <div class="card-header">
                <h3>Registrate</h3>
                <div id="mensaje"></div>
            </div>
            <div class="card-body">
                <form method="POST" id="form_ajax" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="usuario" name="nombre" required>
                    </div>
                    <div class="error" id="e_nombre"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" name="contrasena" minlength="6" required>
                    </div>
                    <div class="error" id="e_password"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="repetir password" name="contrasena2" minlength="6" required>
                    </div>
                    <div class="error" id="e_password2"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="email" name="email" required>
                    </div>
                    <div class="error" id="e_email"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="nombre" name="nombree" required>
                    </div>
                    <div class="error" id="e_nombree"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="apellidos" name="apellidos" required>
                    </div>
                    <div class="error" id="e_apellidos"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="telefono" name="telefono" required>
                    </div>
                    <div class="error" id="e_telefono"></div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="direccion" name="direccion" required>
                    </div>
                    <div class="error" id="e_direccion"></div>
                    <div class="form-group">
                        <input type="hidden" name="ajax">
                        <input type="submit" id="btn_ajax" value="Registrar" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer" style="border-top: none">
                <div class="form-group">
                    <div class="d-flex justify-content-center links" style="text-align: left">
                        <div><a href="login.php"><i class="fas fa-angle-left"></i> Volver atras</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="separador"></div>
<?php
require_once('includes/footer.php');
?>