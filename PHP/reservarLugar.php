<?php
require 'conexion.php';

$idUsuario = $_POST['idUsuario'];
$lugares = $_POST['lugares'];
$equiaje = $_POST['equiaje'];
$idViaje = $_POST['idViaje'];

try {
    //code...
    $q = "INSERT INTO `pasajero` (`idPasajero`, `lugares`, `edoAcep`, `equipaje`, `idViaje`, `idUsuario`) VALUES (NULL, '$lugares', '0', '$equiaje', '$idViaje', '$idUsuario')";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";
} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}