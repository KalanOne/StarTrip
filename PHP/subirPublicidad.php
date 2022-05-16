<?php
require 'conexion.php';

$vigencia = $_POST['vigencia'];
$empresa = $_POST['empresa'];
$url = $_POST['url'];
$idUsuario = $_POST['idUsuario'];


try {
    //code...

    $q = "INSERT INTO `publicidad` (`idPublicidad`, `ruta`, `empresa`, `vigencia`, `idAdministrador`) VALUES (NULL, '$url', '$empresa', '$vigencia', '$idUsuario')";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";
} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}
