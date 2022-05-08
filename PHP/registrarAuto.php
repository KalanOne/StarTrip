<?php
require 'conexion.php';


$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$color = $_POST['color'];
$placas = $_POST['placas'];
$idUsuario = $_POST['idUsuario'];


try {
    //code...

    $q = "SELECT COUNT(*) as `Contar` FROM `auto` WHERE `placas` = '$placas'";
    $consulta = $conexion->query($q) or die(print($conexion->errorInfo()));

    while ($item = $consulta->fetch(PDO::FETCH_OBJ)) {
        # code...

        if ($item->Contar == 0) {
            # code...
            $q = "INSERT INTO `auto` (`idAuto`, `marca`, `modelo`, `placas`, `color`, `idUsuario`) VALUES (NULL, '$marca', '$modelo', '$placas', '$color', '$idUsuario')";
            $res  = $conexion->query($q) or die(print($conexion->errorInfo()));

            echo "Exitoso";
            return;
        } else {
            echo "Automovil resgitrado";
            return;
        }
    }
} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}
