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
    <link rel="stylesheet" href="CSS/calificarUsuario.css">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="JQuey/jquery.min.js"></script>
    <script src="JS/calificarUsuario.js"></script>
</head>

<body>

    <!-- ========== Start Menu principal ========== -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="calificarUsuario.php"><?php
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
                <a class="nav-link active" aria-current="page" href="#">Calificar usuario</a>
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



    <!-- ========== Start Contenido de personas a calificar ========== -->
    <div id="contienePersonas" class="container py-3 my-2 minimoFoot">

        <!-- ========== Start Formulario de ejemplo de calificar usuario ========== -->
        <!-- <form action="#">
            <div class="row mt-3 border border-secondary py-2">
                <div class="col-md-3">
                    <p>Hector Reyes Reyes</p>
                    <p>ID Viaje: 1</p>
                    <p>44 35 81 5700</p>
                    <p>19121038@morelia.tecnm.mx</p>
                </div>
                <div class="col-md-2">
                    <label for="inputCalificacion" class="col-form-label mb-3">Calificación</label>
                    <input type="number" id="inputCalificacion" class="form-control" min="0" max="5" required>
                </div>
                <div class="col-md-3">
                    <label for="inputOpinion" class="form-label">Opinión</label>
                    <div class="form-floating">
                        <textarea class="form-control docOpinion" placeholder="Leave a comment here"
                            id="inputOpinion" style="height: 120px"></textarea>
                        <label for="inputOpinion">Opina sobre el usuario</label>
                    </div>
                </div>
                <div class="col my-2"></div>
                <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                    <button type="button" class="btn btn-outline-success" onclick="calificar('1')">Enviar</button>
                </div>
            </div>
        </form> -->
        <!-- ========== End Formulario de ejemplo de calificar usuario ========== -->

    </div>
    <!-- ========== End Contenido de personas a calificar ========== -->



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