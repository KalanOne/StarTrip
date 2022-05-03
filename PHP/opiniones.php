<?php
require 'conexion.php';

$idUsuario = $_POST['idUsuario'];

try {
    //code...

    $q = "SELECT * FROM `opinion` WHERE `idCalificado` = '$idUsuario' AND `estado` = 2";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idOpinion' => $item->idOpinion,
            'descripcion' => $item->descripcion,
            'calificacion' => $item->calificacion
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}