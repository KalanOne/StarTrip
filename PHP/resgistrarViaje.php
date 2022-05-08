<?php
require 'conexion.php';

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$auto = $_POST['auto'];
$lugares = $_POST['lugares'];
$idUsuario = $_POST['idUsuario'];


try {
    //code...

    $q = "INSERT INTO `viaje` (`idViaje`, `fecha`, `hora`, `lugares`, `estado`, `idOrigen`, `idDestino`, `idUsuario`, `idAuto`) VALUES (NULL, '$fecha', '$hora', '$lugares', '0', '$origen', '$destino', '$idUsuario', '$auto')";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}