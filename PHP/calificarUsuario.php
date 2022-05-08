<?php
require 'conexion.php';

$idOpinion = $_POST['idOpinion'];
$calificacion = $_POST['calificacion'];
$opinion = $_POST['opinion'];

try {
    //code...

    $q = "UPDATE `opinion` SET `descripcion`='$opinion', `calificacion`='$calificacion', `estado`='2' WHERE `idOpinion` = '$idOpinion'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}