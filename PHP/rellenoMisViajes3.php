<?php
require 'conexion.php';

$idUsuarioActual = $_POST['idUsuarioActual'];


try {
    //code...

    $q = "SELECT * FROM `pasajero` WHERE `idUsuario` = '$idUsuarioActual' AND `edoAcep` = 1";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idPasajero' => $item->idPasajero,
            'lugares' => $item->lugares,
            'equipaje' => $item->equipaje,
            'idViaje' => $item->idViaje,
            'idUsuario' => $item->idUsuario
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}