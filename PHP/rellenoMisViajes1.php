<?php
require 'conexion.php';

$idUsuarioActual = $_POST['idUsuarioActual'];


try {
    //code...

    $q = "SELECT * FROM `viaje` NATURAL JOIN `auto` NATURAL JOIN `municipio` NATURAL JOIN `usuario` NATURAL JOIN `destino` WHERE `viaje`.`idUsuario` = '$idUsuarioActual' AND `viaje`.`estado` = 0";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idViaje' => $item->idViaje,
            'fechaViaje' => $item->fecha,
            'horaViaje' => $item->hora,
            'idOrigen' => $item->idOrigen,
            'nombreOrigen' => $item->nombreMun,
            'idDestino' => $item->idDestino,
            'nombreDestino' => $item->nombreDestino,
            'idConductor' => $item->idUsuario,
            'nombreConductor' => $item->nombre,
            'apePaConductor' => $item->apePaterno,
            'apeMaConductor' => $item->apeMaterno,
            'idAuto' => $item->idAuto,
            'marcaAuto' => $item->marca,
            'modeloAuto' => $item->modelo,
            'colorAuto' => $item->color,
            'placasAuto' => $item->placas
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}