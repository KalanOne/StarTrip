<?php
require 'conexion.php';

$idUsuario = $_POST['idUsuario'];


try {
    //code...

    $q = "SELECT * FROM `usuario` NATURAL JOIN `contacto` WHERE `usuario`.`idUsuario` = '$idUsuario'";
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
            'contra' => $item->contrasenia,
            'direccion' => $item->direccion,
            'telefono' => $item->telefono,
            'fechaNac' => $item->fechaNac,
            'edoCivil' => $item->edoCivil,
            'idContacto' => $item->idContacto,
            'nombreCont' => $item->nombreCont,
            'correoCont' => $item->correoCont,
            'telefonoCont' => $item->telefonoCont,
            'fechaNacCont' => $item->fechaNacCont,
        ];
    }

    echo json_encode($data);

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}