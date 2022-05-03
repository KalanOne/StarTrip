<?php

// $host = "localhost";
// $usuario = "root";
// $clave = "";
// $bd = "star_trip";

// $conexion = mysqli_connect($host, $usuario, $clave, $bd);

$conexion = new PDO("mysql:host=localhost;port=3306;dbname=star_trip", "root", "");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>