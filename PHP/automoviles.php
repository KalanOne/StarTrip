<?php
require 'conexion.php';

$idUsuario = $_POST['idUsuario'];


try {
    //code...

    $q = "SELECT * FROM `auto` WHERE `idUsuario` = '$idUsuario'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idAuto' => $item->idAuto,
            'marca' => $item->marca,
            'modelo' => $item->modelo,
            'placas' => $item->placas,
            'color' => $item->color
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}