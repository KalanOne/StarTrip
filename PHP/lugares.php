<?php
require 'conexion.php';


try {
    //code...

    $q = "SELECT * FROM `municipio`";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idMunicipio' => $item->idMunicipio,
            'nombreMun' => $item->nombreMun
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}