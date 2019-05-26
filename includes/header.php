<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Home</title>
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse show" id="navbarsExample04" style="">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/index.php') {
                        echo "<a class=\"nav-link\" href=\"./index.php\" style=\"color: white\">Inicio <i class=\"fas fa-home\"></i></a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./index.php\">Inicio <i class=\"fas fa-home\"></i></a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/tienda.php') {
                        echo "<a class=\"nav-link\" href=\"./tienda.php\" style=\"color: white\">Tienda <i class=\"fas fa-store-alt\"></i></a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./tienda.php\">Tienda <i class=\"fas fa-store-alt\"></i></a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/carrito.php') {
                        echo "<a class=\"nav-link\" href=\"./carrito.php\" style=\"color: white\">Carrito <i class=\"fas fa-shopping-cart\"></i> (0)</a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./carrito.php\">Carrito <i class=\"fas fa-shopping-cart\"></i> (0)</a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/contacto.php') {
                        echo "<a class=\"nav-link\" href=\"./contacto.php\" style=\"color: white\">Contacto <i class=\"fas fa-map-marked-alt\"></i></a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./contacto.php\">Contacto <i class=\"fas fa-map-marked-alt\"></i></a>";
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/panel_control.php') {
                        echo "<a class=\"nav-link\" href=\"./panel_control.php\" style=\"color: white\">Panel de control <i class=\"fas fa-atlas\"></i></a>";
                    } else {
                        echo "<a class=\"nav-link\" href=\"./panel_control.php\">Panel de control <i class=\"fas fa-atlas\"></i></a>";
                    }
                    ?>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <?php
                    if($_SERVER["PHP_SELF"] == '/e-commerce/cuenta.php') {
                        echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\" style=\"color: white\">Usuario <i class=\"fas fa-address-card\"></i></a>";
                    } else {
                        echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">Usuario <i class=\"fas fa-address-card\"></i></a>";
                    }
                    ?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="./cuenta.php">Mi cuenta <i class="fas fa-user"></i></a>
                        <a class="dropdown-item" href="includes/logout.php">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<body>