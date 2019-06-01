<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Home</title>
</head>
<header style="z-index: 2">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="./index.php"><img src="images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse show" id="navbarsExample04" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/index.php') {
                        echo "<a class=\"nav-link\" href=\"./index.php\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-home\"></i> Inicio</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./index.php\"> <i class=\"fas fa-home\"></i> Inicio</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/tienda.php') {
                        echo "<a class=\"nav-link\" href=\"./tienda.php\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-store-alt\"></i> Tienda</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./tienda.php\"> <i class=\"fas fa-store-alt\"></i> Tienda</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                <?php if(isset($_SESSION['usuario'])){ ?>
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/carrito.php') {
                        echo "<a class=\"nav-link\" href=\"./carrito.php\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-shopping-cart\"></i> Carrito (0)</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./carrito.php\"> <i class=\"fas fa-shopping-cart\"></i> Carrito (0)</a>";
                    }
                    ?>
                <?php } ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/contacto.php') {
                        echo "<a class=\"nav-link\" href=\"./contacto.php\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-map-marked-alt\"></i> Contacto</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./contacto.php\"> <i class=\"fas fa-map-marked-alt\"></i> Contacto</a>";
                    }
                    ?>
                </li>
                <?php if(isset($_SESSION['is_admin']) && ($_SESSION['is_admin']) == 'Si'){ ?>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/panel_control.php') {
                        echo "<a class=\"nav-link\" href=\"./panel_control.php\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-atlas\"></i> Panel de control</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./panel_control.php\"> <i class=\"fas fa-atlas\"></i> Panel de control</a>";
                    }
                    ?>
                </li>
                <?php } ?>
            </ul>
            <ul class="navbar-nav navbar-right">
                <?php if(isset($_SESSION['usuario'])){ ?>
                <li class="nav-item dropdown">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/cuenta.php') {
                        echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-address-card\"></i> Usuario</a>";
                    } else {
                        echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\"> <i class=\"fas fa-address-card\"></i> Usuario</a>";
                    }
                    ?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="./cuenta.php"> <i class="fas fa-user"></i> Mi cuenta</a>
                        <a class="dropdown-item" href="includes/logout.php"><i class="fas fa-sign-out-alt"></i>v Cerrar sesión</a>
                    </div>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/login.php' || $_SERVER["PHP_SELF"] == '/e-commerce/registrarse.php') {
                        echo "<a class=\"nav-link\" href=\"./login.php\" style=\"color: white\"><i class=\"fas fa-chevron-right\"></i> <i class=\"fas fa-key\"></i> Conectate o registrate</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./login.php\"> <i class=\"fas fa-key\"></i> Conectate o registrate</a>";
                    }
                    ?>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php"><img src="./images/españa.png" width="25px" height="25px"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php"><img src="./images/ingles.png" width="25px" height="25px"></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>