<?php
require 'conexion.php';
session_start();

$correo = $_POST['correo'];
$contra = $_POST['contra'];

// $correo = "onepunchalan@gmail.com";
// $contra = "mansion123";

try {
    //code...

    $q = "SELECT COUNT(*) as `Contar` FROM `usuario` WHERE `correo` = '$correo'";
    $consulta = $conexion->query($q) or die(print($conexion->errorInfo()));

    while ($item = $consulta->fetch(PDO::FETCH_OBJ)) {
        # code...

        if ($item->Contar == 1) {
            # code...
            $q = "SELECT * FROM `usuario` WHERE `correo` = '$correo' and `contrasenia` = '$contra'";
            $res  = $conexion->query($q) or die(print($conexion->errorInfo()));

            while ($item2 = $res->fetch(PDO::FETCH_OBJ)) {
                # code...

                $_SESSION['nombre'] = $item2->nombre;
                $_SESSION['idActual'] = $item2->idUsuario;
                echo $item2->idUsuario . '\t' . $item2->nombre;
                return;
            }
        }else{
            session_destroy();
            echo "";
            return;
        }
    }
} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}
