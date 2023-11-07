<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>DressRent</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-grey navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-dark">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-dark text-decoration-none" href="mailto:dressrentcorporative@gmail.com">dressrentcorporative@gmail.com</a>
                </div>
                <div>
                    <a class="navbar-sm-brand text-dark text-decoration-none" href="/dressrent/register_v.html">¿Eres vendedor?</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                DressRent
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.php">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contacto</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                     <!-- Agrega un botón para abrir el carrito -->
                    <a class="nav-icon position-relative text-decoration-none" href="#" id="abrir-carrito">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    </a>
                    
                    <!-- Modal del carrito -->
                    <div id="carrito-modal" class="modal" style="display: none;">
                        <div class="modal-content">
                            <span class="close" onclick="cerrarCarrito()">&times;</span>
                            <h2>Carrito de Compras</h2>
                            <table id="items-carrito">
                                <!-- Aquí se generará la tabla con los productos del carrito -->
                            </table>
                            <p id="total-carrito" class="total-carrito">Total: $0.00</p>
                        </div>
                    </div>                 
                    
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo isset($_SESSION['usuario']) ? 'profile.php' : 'register.html'; ?>">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                    </a>

                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/favicon.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>DressRent</b> Tu mejor opción</h1>
                                <h3 class="h2">Alquila la mejor prenda para tu evento</h3>
                                <p>
                                    En DressRent buscamos la fácilidad y comodidad del cliente para alquilar una prenda para cualquier tipo de evento, aquí encontrarás distintas opciones, ideal para todos los gustos.<a rel="sponsored" class="text-success" href="https://templatemo.com" target="_blank"></a>  
                                     <a rel="sponsored" class="text-success" href="https://stories.freepik.com/" target="_blank"></a>
                                    <a rel="sponsored" class="text-success" href="https://unsplash.com/" target="_blank"></a> 
                                    <a rel="sponsored" class="text-success" href="https://icons8.com/" target="_blank"></a>     
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/Compras.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">¡Conócenos!</h1>
                                <h3 class="h2"></h3>
                                <p>
                                    Vive la mejor experiencia de alquiler con nosotros, <br>te contactamos con el vendedor en un clic. <br> 
                                    <h3 class= "h3"></h3>¡Bienvenidos!</h3>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories  -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorías</h1>
                <p>
                    ¡Encontrarás las mejores opciones para tu evento! <br> Contamos con las siguientes categorías.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/Dress1.jpg" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">Vestidos</h5>
                <p class="text-center"><a class="btn btn-success" href="shop.php">Ir a Tienda</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/Traje1.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Trajes</h2>
                <p class="text-center"><a class="btn btn-success" href="shop.php">Ir a Tienda</a></p>
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#"><img src="./assets/img/Acces1.jpg" class="rounded-circle img-fluid border"></a>
                <h2 class="h5 text-center mt-3 mb-3">Accesorios</h2>
                <p class="text-center"><a class="btn btn-success" href="shop.php">Ir a Tienda</a></p>
            </div>
        </div>
    </section>
    <!-- End Categories  -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Los más populares</h1>
                    <p>
                        ¡Estas son nuestras prendas más buscadas!
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="./assets/img/Vrojo.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$600.00</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Vestido Gala</a>
                            <p class="card-text">
                                Resalta en tu evento con este hermoso vestido, largo y elegante en tono rojo.
                            </p>
                            <p class="text-muted">Reviews (120)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="./assets/img/Vnegro2.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$490.00</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Vestido Britney</a>
                            <p class="card-text">
                                Algo formal, pero cómodo. Ideal para cualquier evento.
                            </p>
                            <p class="text-muted">Reviews (80)</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.html">
                            <img src="./assets/img/Zapatos2.jpg" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$360.00</li>
                            </ul>
                            <a href="shop-single.html" class="h2 text-decoration-none text-dark">Zapatos Mike</a>
                            <p class="card-text">
                                El mejor par de zapatos con un efecto matte, todo para combinar tu traje.
                            </p>
                            <p class="text-muted">Reviews (74)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-grey" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">DressRent</h2>
                    <ul class="list-unstyled text-dark footer-link-list">
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" style="color: black;" href="mailto:dressrentcorporative@gmail.com">dressrentcorporative@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-dark border-bottom pb-3 border-light">Productos</h2>
                    <ul class="list-unstyled text-dark footer-link-list">
                        <li><a class="text-decoration-none" style="color: black;" href="#">Vestidos</a></li>
                        <li><a class="text-decoration-none" style="color: black;" href="#">Trajes</a></li>
                        <li><a class="text-decoration-none" style="color: black;" href="#">Accesorios</a></li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-dark border-bottom pb-3 border-light">Información adicional</h2>
                    <ul class="list-unstyled text-dark footer-link-list">
                        <li><a class="text-decoration-none" style="color: black;" href="index.php">Inicio</a></li>
                        <li><a class="text-decoration-none" style="color: black;" href="about.html">Sobre Nosotros</a></li>
                        <li><a class="text-decoration-none" style="color: black;" href="contact.html">Contáctenos</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="w-100 bg-gray py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-dark" style="text-align: center;">
                            Desarrollado por <a rel="sponsored" style="color: black;" href="index.html">DressRent &copy; 2023</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/cart.js"></script>
    <!-- End Script -->
</body>

</html>