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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="Bootstrap/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Icons/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="CSS/cuenta.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="JS/cuenta.js"></script>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="cuenta.php"><?php
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
                <a class="nav-link active" aria-current="page" href="#">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promociones.php">Promociones</a>
            </li>
        </ul>
    </div>

    <div class="container py-3 my-2">
        <div class="row mb-4">
            <h3 class="text-center fw-light" id="nombreCompleto"></h3>
        </div>
        <form action="#" autocomplete="off">
            <div class="row my-2">
                <div class="col-md-1">
                    <label for="inputNombre" class="col-form-label">Nombre</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputNombre" disabled>
                </div>
                <div class="col-md-1">
                    <label for="inputCorreo" class="col-form-label">Correo electrónico</label>
                </div>
                <div class="col-md-3">
                    <input type="email" class="form-control" id="inputCorreo" disabled>
                </div>
                <div class="col-md-1">
                    <label for="inputFecha" class="col-form-label">Fecha de nacimiento</label>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="inputFecha" disabled>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-1">
                    <label for="inputTel" class="col-form-label">Teléfono</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputTel" required>
                </div>
                <div class="col-md-1">
                    <label for="inputContra" class="col-form-label">Contraseña</label>
                </div>
                <div class="col-md-3">
                    <input type="password" class="form-control" id="inputContra" required>
                </div>
                <div class="col-md-1">
                    <label for="inputDireccion" class="col-form-label">Dirección</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputDireccion" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-1">
                    <label for="inputEdoCivil" class="col-form-label">Estado civil</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputEdoCivil" required>
                </div>
            </div>
            <div class="row my-4">
                <h4 class="text-center fw-light">Contacto de confianza</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-1">
                    <label for="inputNombreCont" class="col-form-label">Nombre completo</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputNombreCont" required>
                </div>
                <div class="col-md-1">
                    <label for="inputCorreoCont" class="col-form-label">Correo electrónico</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputCorreoCont" required>
                </div>
                <div class="col-md-1">
                    <label for="inputFechaCont" class="col-form-label">Fecha de nacimiento</label>
                </div>
                <div class="col-md-3">
                    <input type="date" class="form-control" id="inputFechaCont" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-1">
                    <label for="inputTelCont" class="col-form-label">Teléfono</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="inputTelCont" required>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-success mt-5" id="guardarInfo">Guardar</button>
            </div>
        </form>
    </div>

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

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <!-- <script src="Bootstrap/popper.min.js"></script>
    <script src="Bootstrap/bootstrap.min.js"></script> -->
</body>

</html>