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
                $_SESSION['admin'] = "No";
                echo "Usuario";
                return;
            }
        } else {

            $q = "SELECT COUNT(*) as `Contar` FROM `adminstrador` WHERE `correo` = '$correo'";
            $consulta = $conexion->query($q) or die(print($conexion->errorInfo()));

            while ($item3 = $consulta->fetch(PDO::FETCH_OBJ)) {
                # code...
                if ($item3->Contar == 1) {
                    # code...
                    $q = "SELECT * FROM `adminstrador` WHERE `correo` = '$correo' and `contrasenia` = '$contra'";
                    $res  = $conexion->query($q) or die(print($conexion->errorInfo()));

                    while ($item4 = $res->fetch(PDO::FETCH_OBJ)) {
                        # code...

                        $_SESSION['nombre'] = "";
                        $_SESSION['idActual'] = $item4->idAdministrador;
                        $_SESSION['admin'] = "Si";
                        echo "Admin";
                        return;
                    }
                } else {
                    # code...

                    session_destroy();
                    echo "Datos mal";
                    return;
                }
            }
        }
    }
} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}
