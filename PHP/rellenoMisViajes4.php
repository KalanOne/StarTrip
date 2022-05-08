<?php
require 'conexion.php';

$idViaje = $_POST['idViaje'];


try {
    //code...

    $q = "SELECT * FROM `viaje` INNER JOIN `auto` ON `viaje`.`idAuto` = `auto`.`idAuto` INNER JOIN `municipio` ON `viaje`.`idOrigen` = `municipio`.`idMunicipio` INNER JOIN `usuario` ON `viaje`.`idUsuario` = `usuario`.`idUsuario` INNER JOIN `destino` ON `viaje`.`idDestino` = `destino`.`idDestino` WHERE `viaje`.`idViaje` = '$idViaje' AND `viaje`.`estado` = 0";
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