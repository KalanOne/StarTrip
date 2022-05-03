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
    <link rel="stylesheet" href="CSS/buscarViaje.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="JS/buscarViaje.js"></script>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="index.html"><?php
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
                <a class="nav-link active" aria-current="page" href="#">Buscar viaje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misViajes.html">Mis viajes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="apuntarViaje.html">Apuntar viaje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="misAutomoviles.html">Mis automoviles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="calificarUsuario.html">Calificar usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cuenta.html">Cuenta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="promociones.html">Promociones</a>
            </li>
        </ul>
    </div>

    <div class="container py-3 my-2">
        <form action="#">
            <div class="row">
                <div class="col-md-1">
                    <label for="inputOrigen" class="col-form-label">Origen</label>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example" id="inputOrigen">
                        <!-- <option selected>Elige un origen</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> -->
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="inputDestino" class="col-form-label">Destino</label>
                </div>
                <div class="col-md-2">
                    <select class="form-select" aria-label="Default select example" id="inputDestino">
                        <!-- <option selected>Elige un destino</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option> -->
                    </select>
                </div>
                <div class="col-md-1">
                    <label for="inputFecha" class="col-form-label">Fecha</label>
                </div>
                <div class="col-md-2">
                    <input type="date" id="inputFecha" class="form-control" aria-describedby="fechaHelpInline" required>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-outline-primary" id="buscarViajeBTN"><i class="bi bi-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container py-3 my-2 minimoFoot">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Origen</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Lugares</th>
                        <th scope="col">Conductor</th>
                        <th scope="col">Opiniones</th>
                        <th scope="col">Reservar</th>
                    </tr>
                </thead>
                <tbody id="columnasViajes">
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Morelia</td>
                        <td>Nocupetaro</td>
                        <td>30-4-2022</td>
                        <td>18:30 hrs</td>
                        <td>Alan Garcia Diaz</td>
                        <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#Opinion1">
                                Ver
                            </button></td>
                        <td>3</td>
                        <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#Reservar1">
                                Reservar
                            </button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Morelia</td>
                        <td>Nocupetaro</td>
                        <td>30-4-2022</td>
                        <td>10:30 hrs</td>
                        <td>Hector David Reyes Reyes</td>
                        <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#Opinion2">
                                Ver
                            </button></td>
                        <td>2</td>
                        <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#Reservar2">
                                Reservar
                            </button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Morelia</td>
                        <td>Nocupetaro</td>
                        <td>30-4-2022</td>
                        <td>13:00 hrs</td>
                        <td>Diego Ruiz Ayala</td>
                        <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#Opinion3">
                                Ver
                            </button></td>
                        <td>4</td>
                        <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                data-bs-target="#Reservar3">
                                Reservar
                            </button></td>
                    </tr> -->
                </tbody>
            </table>
        </div>

        <div id="modales">
            <!-- Modal opiniones 1  -->

            <!-- <div class="modal fade" id="Opinion1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Alan Garcia Diaz</h5>
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

            <!-- Modal reservar 1  -->

            <!-- <div class="modal fade" id="Reservar1" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Viaje 1</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="PHP/reservarLugar.php" autocomplete="off" method="post" id="formulario1">
                                    <div class="mb-3">
                                        <label for="lugaresViaje1" class="form-label">Lugares</label>
                                        <input type="number" class="form-control" id="lugaresViaje1" min="1" max="5"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="equipajeViaje1" class="form-label">Equipaje</label>
                                        <div class="form-floating">
                                            <textarea class="form-control docEquipaje" placeholder="Leave a comment here"
                                                id="equipajeViaje1" style="height: 100px"></textarea>
                                            <label for="equipajeViaje1">Documenta tu equipaje</label>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success" onclick="reservar('1')">Reservar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div> -->

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