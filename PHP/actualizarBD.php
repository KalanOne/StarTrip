<?php
require 'conexion.php';


try {
    //code...

    $q = "SELECT * FROM `viaje` WHERE `fecha` < CURRENT_DATE AND `estado` = 0";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $q = "UPDATE `viaje` SET `estado`='1' WHERE `idViaje` = '$item->idViaje'";
        $consulta = $conexion->query($q) or die(print($conexion->errorInfo()));
        $q = "UPDATE `opinion` SET `estado`='1' WHERE `idViaje` = '$item->idViaje'";
        $consulta = $conexion->query($q) or die(print($conexion->errorInfo()));
    }

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}