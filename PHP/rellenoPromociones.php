<?php
require 'conexion.php';


try {
    //code...

    $q = "SELECT * FROM `publicidad` WHERE `vigencia` > CURRENT_DATE()";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idPublicidad' => $item->idPublicidad,
            'ruta' => $item->ruta,
            'empresa' => $item->empresa,
            'vigencia' => $item->vigencia,
            'idAdministrador' => $item->idAdministrador
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}