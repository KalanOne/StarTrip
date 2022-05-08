<?php
require 'conexion.php';

$idPasajero = $_POST['idPasajero'];


try {
    //code...

    $q = "UPDATE `pasajero` SET `edoAcep`='1' WHERE `idPasajero` = '$idPasajero'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}