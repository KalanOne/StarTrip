<?php
require 'conexion.php';

$idUsuario = $_POST['idUsuario'];


try {
    //code...

    $q = "SELECT * FROM `opinion` WHERE `idCalificador` = '$idUsuario' AND `estado` = 1";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idOpinion' => $item->idOpinion,
            'descripcion' => $item->descripcion,
            'calificacion' => $item->calificacion,
            'estado' => $item->estado,
            'idCalificado' => $item->idCalificado,
            'idCalificador' => $item->idCalificador,
            'idViaje' => $item->idViaje
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}