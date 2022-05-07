<?php
require 'conexion.php';

$idViaje = $_POST['idViaje'];


try {
    //code...

    $q = "SELECT * FROM `pasajero` NATURAL JOIN `usuario` WHERE `idViaje` = '$idViaje' AND `edoAcep` = 1";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idPasajero' => $item->idPasajero,
            'lugares' => $item->lugares,
            'equipaje' => $item->equipaje,
            'estadoPasajero' => $item->edoAcep,
            'idUsuario' => $item->idUsuario,
            'nombrePasajero' => $item->nombre,
            'apePaPasajero' => $item->apePaterno,
            'apeMaPasajero' => $item->apeMaterno,
            'correo' => $item->correo,
            'telefono' => $item->telefono,
            'direccion' => $item->direccion,
            'fechaNacimiento' => $item->fechaNac
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}