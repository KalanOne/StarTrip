<?php
require 'conexion.php';

$idCalificado = $_POST['idCalificado'];


try {
    //code...

    $q = "SELECT * FROM `usuario` WHERE `idUsuario` = '$idCalificado'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $data = [];

    while ($item = $res->fetch(PDO::FETCH_OBJ)) {
        # code...

        $data[] = [
            'idUsuario' => $item->idUsuario,
            'nombre' => $item->nombre,
            'apePaterno' => $item->apePaterno,
            'apeMaterno' => $item->apeMaterno,
            'correo' => $item->correo,
            'direccion' => $item->direccion,
            'telefono' => $item->telefono
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}