<?php
require 'conexion.php';

$idAuto = $_POST['idAuto'];

try {
    //code...

    $q = "DELETE FROM `auto` WHERE `idAuto` = '$idAuto'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}