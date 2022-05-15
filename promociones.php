<?php

session_start();
$nombre = $_SESSION['nombre'];
$idActual = $_SESSION['idActual'];
$admin = $_SESSION['admin'];

if (!isset($idActual)) {
    # code...
    header("location: index.html");
    exit();
}
if ($admin == "Si") {
    # code...
    header("location: subirPublicidad.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>STAR TRIPS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="Bootstrap/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Icons/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="CSS/promociones.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="JQuey/jquery.min.js"></script>
    <script src="JS/promociones.js"></script>
</head>

<body>

    <!-- ========== Start Menu principal ========== -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="promociones.php"><?php
                                                            echo " ID: ";
                                                            echo '<span id="idUsuarioActual">';
                                                            echo $idActual;
                                                            echo '</span> ';
                                                            echo $nombre;
                                                            ?></a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link fw-lighter" href="PHP/salir.php">CERRAR SESION</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- ========== End Menu principal ========== -->



    <!-- ========== Start Menu de navegacion ========== -->
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="buscarViaje.php">Buscar viaje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misViajes.php">Mis viajes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="apuntarViaje.php">Apuntar viaje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misAutomoviles.php">Mis automoviles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calificarUsuario.php">Calificar usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cuenta.php">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Promociones</a>
            </li>
        </ul>
    </div>
    <!-- ========== End Menu de navegacion ========== -->



    <!-- ========== Start Contenido de promociones ========== -->
    <div class="container py-3 my-2 minimoFoot">

        <!-- ========== Start Contenido de promociones vigentes ========== -->
        <div class="row row-cols-1 row-cols-md-2 g-3" id="contienePromociones">

            <!-- ========== Start Contenido de ejemplo de promociones vigentes ========== -->
            <!-- <div class="col">
                <div class="card h-100">
                    <img src="IMGPU/cinepolis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cinepolis</h5>
                        <p class="card-text">Vigencia 25/05/2022</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="IMGPU/oxxo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Oxxo</h5>
                        <p class="card-text">Vigencia 25/05/2022</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="IMGPU/cinepolis.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cinepolis</h5>
                        <p class="card-text">Vigencia 25/05/2022</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="IMGPU/oxxo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Oxxo</h5>
                        <p class="card-text">Vigencia 25/05/2022</p>
                    </div>
                </div>
            </div> -->
            <!-- ========== End Contenido de ejemplo de promociones vigentes ========== -->

        </div>
        <!-- ========== End Contenido de promociones vigentes ========== -->

        <!-- ========== Start Mensaje de no encontrar mas promociones vigentes ========== -->
        <h3 class="text-center mt-5">
            <small class="text-muted">No se han encontrado mas promociones vigentes</small>
        </h3>
        <!-- ========== End Mensaje de no encontrar mas promociones vigentes ========== -->

    </div>
    <!-- ========== End Contenido de promociones ========== -->



    <!-- ========== Start Pie de pagina web ========== -->
    <footer class="bg-dark text-center text-white py-5 my-2">
        <div class="container p-4 pb-0">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-light mb-2">Contáctanos</h6>
                    <p class="m-0 fw-light text-white-50">Tel: (443) 55 00 9200</p>
                    <p class="m-0 fw-light text-white-50">Correo: star-help@startrip.com</p>
                </div>
                <div class="col-md-6">
                    <div class="row mb-2">
                        <h6 class="fw-light">Siguenos en nuestras redes sociales</h6>
                    </div>
                    <section class="mb-4">
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                            <i class="fab fa-twitter"></i>
                        </a>

                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                            <i class="fab fa-google"></i>
                        </a>

                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </section>
                </div>
            </div>
        </div>
    </footer>
    <!-- ========== End Pie de pagina web ========== -->


    
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <!-- <script src="Bootstrap/popper.min.js"></script>
    <script src="Bootstrap/bootstrap.min.js"></script> -->
</body>

</html>