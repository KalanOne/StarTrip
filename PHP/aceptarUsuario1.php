<?php
require 'conexion.php';

$idUsuario1 = $_POST['idUsuario1'];
$idUsuario2 = $_POST['idUsuario2'];
$idViaje = $_POST['idViaje'];


try {
    //code...

    $q = "INSERT INTO `opinion` (`idOpinion`, `descripcion`, `calificacion`, `estado`, `idCalificado`, `idCalificador`, `idViaje`) VALUES (NULL, '', '', '0', '$idUsuario1', '$idUsuario2', '$idViaje')";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $q = "INSERT INTO `opinion` (`idOpinion`, `descripcion`, `calificacion`, `estado`, `idCalificado`, `idCalificador`, `idViaje`) VALUES (NULL, '', '', '0', '$idUsuario2', '$idUsuario1', '$idViaje')";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}