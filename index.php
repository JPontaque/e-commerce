<?php
require_once('includes/header.php');
?>

<main role="main">

    <!--Carousel Wrapper-->
    <div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel" style="z-index: 1;">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
            <li data-target="#video-carousel-example2" data-slide-to="1"></li>
            <li data-target="#video-carousel-example2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!-- First slide -->
            <div class="carousel-item active">
                <!--Mask color-->
                <div class="view">
                    <!--Video source-->
                    <video class="video-fluid" autoplay loop muted>
                        <source src="video/Lines.mp4" type="video/mp4" />
                    </video>
                    <div class="mask rgba-indigo-light"></div>
                </div>

                <!--Caption-->
                <div class="carousel-caption">
                    <div class="animated fadeInDown">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <h1>¡Bienvenido a Play 4Ever!</h1>
                                <p>Si es tu primera vez en esta página, y no tienes cuenta, puedes registrarte desde el siguiente boton. Varias ofertas te estan esperando.</p>
                                <p><a class="btn btn-lg btn-primary" href="registrarse.php" role="button">Registrarse</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Caption-->
            </div>
            <!-- /.First slide -->

            <!-- Second slide -->
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <!--Video source-->
                    <video class="video-fluid" autoplay loop muted>
                        <source src="video/animation-intro.mp4" type="video/mp4" />
                    </video>
                    <div class="mask rgba-purple-slight"></div>
                </div>

                <!--Caption-->
                <div class="carousel-caption">
                    <div class="animated fadeInDown">
                        <div class="container">
                            <div class="carousel-caption text-left"  style="color: black">
                                <h1>¿Aún no conoces nuestra tienda?</h1>
                                <p>Si no viste nuestros productos, puedes hacerlo desde 'Tienda' en el menú o desde el siguiente botón. ¿A que esperas?</p>
                                <p><a class="btn btn-lg btn-primary" href="tienda.php" role="button">Tienda</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Caption-->
            </div>
            <!-- /.Second slide -->

            <!-- Third slide -->
            <div class="carousel-item">
                <!--Mask color-->
                <div class="view">
                    <!--Video source-->
                    <video class="video-fluid" autoplay loop muted>
                        <source src="video/Nature-Sunset.mp4" type="video/mp4" />
                    </video>
                    <div class="mask rgba-black-strong"></div>
                </div>

                <!--Caption-->
                <div class="carousel-caption">
                    <div class="animated fadeInDown">
                        <div class="container">
                            <div class="carousel-caption" style="color: black; font-weight: bold">
                                <h1>¿Necesitas ayuda? Contactanos</h1>
                                <p>Si tienes alguna duda, algún problema o alguna sugerencia, no dudes en contactar con nosotros. Mas abajo tienes información.</p>
                                <br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Caption-->
            </div>
            <!-- /.Third slide -->
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--Carousel Wrapper-->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/tiendita.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Tienda física</h2>
                <p>Nuestra sede principal se encuentra en Zaragoza. Somos una tienda pequeña, pero con muchas ganas de crecer y hacer un futuro con vosotros. <p>Puedes visitar nuestra tienda online para poder ver todos nuestros productos en stock.</p></p>
                <p><a class="btn btn-secondary" href="tienda.php" role="button">Ver tienda »</a></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/atencion.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Atención telefónica</h2>
                <p>Disponemos de atención al cliente 24/7. Además de poder contactar con nosotros desde la web, tambien puedes llamar al servicio de atención al cliente que tenemos, usando la siguiente franja horaria: <p>Lunes - Viernes de 10.00h - 20.00h</p></p>
                <p></p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="images/galardon.png" alt="Generic placeholder image" width="140" height="140">
                <h2>Entrega Premium</h2>
                <p>Disponemos de un galardón por tener uno de los servicios de entrega de compra mas rápidos a nivel Nacional, y totalmente gratis. <p>Si quieres pertenecer a nuestra pequeña familia, registrate y ayudanos a crecer.</p></p>
                <p><a class="btn btn-secondary" href="registrarse.php" role="button">Registrarse »</a></p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="well well-sm">
            <h3><strong>Contacta con nosotros</strong></h3>
        </div>
        <section id="contact">
        <div class="row">
            <div class="col-md-7">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.4084406358434!2d-0.8913981846171048!3d41.64691647924122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5914dd239c2167%3A0xa3664cf92df95b58!2sCalle+Dr.+Cerrada%2C+Zaragoza!5e0!3m2!1ses!2ses!4v1559406714222!5m2!1ses!2ses" width="100%" height="315" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div class="col-md-5">
                <h4><strong>Estar en contacto</strong></h4>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" name="" value="" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="" value="" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control" name="" value="" placeholder="Telefono" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="" rows="3" placeholder="Mensaje" required></textarea>
                    </div>
                    <button class="btn btn-default" type="submit" name="button">
                        <i class="fas fa-paper-plane" aria-hidden="true"></i> Enviar
                    </button>
                </form>
            </div>
        </div>
        </section>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2017-2018 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
</main>

<?php
require_once('includes/footer.php');
?>
