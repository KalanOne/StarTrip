<?php
require 'conexion.php';

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];

try {
    //code...

    $q = "SELECT * FROM `viaje` NATURAL JOIN `usuario` WHERE `idOrigen` = '$origen' AND `idDestino` = '$destino' AND `fecha` = '$fecha' AND `estado` = 0";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idViaje' => $item->idViaje,
            'fecha' => $item->fecha,
            'hora' => $item->hora,
            'lugares' => $item->lugares,
            'idOrigen' => $item->idOrigen,
            'idDestino' => $item->idDestino,
            'idUsuario' => $item->idUsuario,
            'nombre' => $item->nombre,
            'apePa' => $item->apePaterno,
            'apeMa' => $item->apeMaterno
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}
