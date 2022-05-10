<?php

session_start();
$nombre = $_SESSION['nombre'];
$idActual = $_SESSION['idActual'];

if (!isset($idActual)) {
    # code...
    header("location: index.html");
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
    <link rel="stylesheet" href="CSS/misViajes.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="JQuey/jquery.min.js"></script>
    <script src="JS/misViajes.js"></script>
</head>

<body>

    <!-- ========== Start Menu principal ========== -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="misViajes.php"><?php
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
                <a class="nav-link active" aria-current="page" href="#">Mis viajes</a>
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
                <a class="nav-link" href="promociones.php">Promociones</a>
            </li>
        </ul>
    </div>
    <!-- ========== End Menu de navegacion ========== -->



    <!-- ========== Start Contenido de viajes ========== -->
    <div id="contieneViajes" class=" minimoFoot">

        <!-- ========== Start Contenido ejemplo de mis muestra de personas que participan en mis viajes ========== -->
        <!-- <section class="container py-3 my-2">
            <div class="row">
                <ul class="list-group list-group-horizontal-md">
                    <li class="list-group-item flex-fill">ID: 1</li>
                    <li class="list-group-item flex-fill">Morelia - Nocupetaro</li>
                    <li class="list-group-item flex-fill">30/04/2022</li>
                    <li class="list-group-item flex-fill">18:30 hrs</li>
                    <li class="list-group-item flex-fill">Conductor: Alan Garcia Diaz</li>
                    <li class="list-group-item flex-fill">Automóvil: SEI 4 Pro Roja PB53APKPAH</li>
                </ul>
            </div>
            <div class="row mt-3 border border-secondary">
                <div class="col-md-3">
                    <p>Hector Reyes Reyes</p>
                    <p>33 años</p>
                    <p>44 35 81 5700</p>
                    <p>19121038@morelia.tecnm.mx</p>
                </div>
                <div class="col-md-2">
                    <p>
                        Rincon de San Francisco #570 Fracc. Fresnos Arboledas Morelia Michoacán
                    </p>
                </div>
                <div class="col-md-3">
                    <p>2 maletas de tamaño mediano, 1 mochila y una cubeta</p>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#Opinion1">
                        Opiniones
                    </button>
                </div>
                <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                    <button type="button" class="btn btn-outline-success" onclick="aceptarUsuario('1')">Aceptar</button>
                    <button type="button" class="btn btn-outline-danger">Rechazar</button>
                </div>
            </div> -->
        <!-- Segunda persona -->
        <!-- <div class="row mt-3 border border-secondary">
                <div class="col-md-3">
                    <p>Hector Reyes Reyes</p>
                    <p>33 años</p>
                    <p>44 35 81 5700</p>
                    <p>19121038@morelia.tecnm.mx</p>
                </div>
                <div class="col-md-2">
                    <p>
                        Rincon de San Francisco #570 Fracc. Fresnos Arboledas Morelia Michoacán
                    </p>
                </div>
                <div class="col-md-3">
                    <p>2 maletas de tamaño mediano, 1 mochila y una cubeta</p>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#Opinion1">
                        Opiniones
                    </button>
                </div>
                <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                    <button type="button" class="btn btn-outline-success disabled">Aceptado</button>
                </div>
            </div>
        </section> -->
        <!-- ========== End Contenido ejemplo de mis muestra de personas que participan en mis viajes ========== -->

    </div>
    <!-- ========== End Contenido de viajes ========== -->



    <!-- ========== Start Contenido de modales de opiniones ========== -->
    <div id="contieneModales">

        <!-- ========== Start Contenido de ejemplo de modales de opiniones ========== -->
        <!-- <div class="modal fade" id="Opinion1" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hector Reyes Reyes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-responsive table-striped">
                            <thead>
                                <tr class="table-dark">
                                    <th scope="col">ID</th>
                                    <th scope="col">Calificación</th>
                                    <th scope="col">Opinión</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>5</td>
                                    <td>Lorem ipsum dolor sit amet.</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>5</td>
                                    <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Alias, nemo.</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>5</td>
                                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam iusto,
                                        illo aperiam quos facere voluptate.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- ========== End Contenido de ejemplo de modales de opiniones ========== -->

    </div>
    <!-- ========== End Contenido de modales de opiniones ========== -->



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