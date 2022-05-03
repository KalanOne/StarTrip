<?php
require 'conexion.php';
session_start();


$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$apePa = $_POST['apePa'];
$apeMa = $_POST['apeMa'];
$direccion = $_POST['direccion'];
$tel = $_POST['tel'];
$contra = $_POST['contra'];
$fecha = $_POST['fecha'];
$edoCiv = $_POST['edoCiv'];
$correoCont = $_POST['correoCont'];
$nombreCont = $_POST['nombreCont'];
$fechaCont = $_POST['fechaCont'];
$telCont = $_POST['telCont'];


try {
    //code...

    $q = "SELECT COUNT(*) as `Contar` FROM `usuario` WHERE `correo` = '$correo'";
    $consulta = $conexion->query($q) or die(print($conexion->errorInfo()));

    while ($item = $consulta->fetch(PDO::FETCH_OBJ)) {
        # code...

        if ($item->Contar == 0) {
            # code...
            $q = "INSERT INTO `usuario` (`idUsuario`, `nombre`, `apePaterno`, `apeMaterno`, `correo`, `contrasenia`, `direccion`, `telefono`, `fechaNac`, `edoCivil`, `califFinal`) VALUES (NULL, '$nombre', '$apePa', '$apeMa', '$correo', '$contra', '$direccion', '$tel', '$fecha', '$edoCiv', '0')";
            $res  = $conexion->query($q) or die(print($conexion->errorInfo()));

            $q = "SELECT * FROM `usuario` WHERE `correo` = '$correo'";
            $res  = $conexion->query($q) or die(print($conexion->errorInfo()));

            $idUsuario = 0;

            while ($item2 = $res->fetch(PDO::FETCH_OBJ)) {
                # code...
                $idUsuario = $item2->idUsuario;
            }

            $q = "INSERT INTO `contacto` (`idContacto`, `nombre`, `correo`, `telefono`, `idUsuario`) VALUES ('$idUsuario', '$nombreCont', '$correoCont', '$telCont', '$idUsuario')";
            $res  = $conexion->query($q) or die(print($conexion->errorInfo()));

            echo "Registrado";
            return;
        } else {
            echo "Correo registrado";
            return;
        }
    }
} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}
