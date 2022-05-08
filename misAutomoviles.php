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
    <link rel="stylesheet" href="CSS/misAutomoviles.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="JS/misAutomoviles.js"></script>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="misAutomoviles.php"><?php
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
                <a class="nav-link active" aria-current="page" href="#">Mis automoviles</a>
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

    <div class="container my-5 minimoFoot">
        <section id="Automoviles">
            <!-- <div class="row my-3 py-2 border border-secondary">
                <div class="col-md-2">
                    <p>RAV</p>
                </div>
                <div class="col-md-2">
                    <p>SEI 4 Pro</p>
                </div>
                <div class="col-md-2">
                    <p>Roja</p>
                </div>
                <div class="col-md-2">
                    <p>PB53APKPAH</p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                    <button type="button" class="btn btn-outline-danger" onclick="eliminarAuto('1')">Eliminar</button>
                </div>
            </div>
            <div class="row my-3 py-2 border border-secondary">
                <div class="col-md-2">
                    <p>Nissan</p>
                </div>
                <div class="col-md-2">
                    <p>Versa 2019</p>
                </div>
                <div class="col-md-2">
                    <p>Plata</p>
                </div>
                <div class="col-md-2">
                    <p>PB782LPSK78</p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2 d-flex align-content-around flex-wrap justify-content-center">
                    <button type="button" class="btn btn-outline-danger">Eliminar</button>
                </div>
            </div> -->
        </section>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary mt-5" data-bs-toggle="modal"
                data-bs-target="#autoModal">
                Nuevo automóvil
            </button>
        </div>
        <div class="modal fade" id="autoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar nuevo automóvil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <form action="#" autocomplete="off">
                                <div class="mb-2">
                                    <label for="inputMarca" class="form-label">Marca</label>
                                    <input type="text" class="form-control" id="inputMarca" required>
                                </div>
                                <div class="mb-2">
                                    <label for="inputModelo" class="form-label">Modelo</label>
                                    <input type="text" class="form-control" id="inputModelo" required>
                                </div>
                                <div class="mb-2">
                                    <label for="inputColor" class="form-label">Color</label>
                                    <input type="text" class="form-control" id="inputColor" required>
                                </div>
                                <div class="mb-2">
                                    <label for="inputPlacas" class="form-label">Placas</label>
                                    <input type="text" class="form-control" id="inputPlacas" required>
                                </div>
                                <button type="button" class="btn btn-success" id="enviarAuto">Guardar</button>
                            </form>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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