<?php
require 'conexion.php';

$tel = $_POST['tel'];
$contra = $_POST['contra'];
$direccion = $_POST['direccion'];
$edoCivil = $_POST['edoCivil'];
$nombreCont = $_POST['nombreCont'];
$correoCont = $_POST['correoCont'];
$fechaNacCont = $_POST['fechaNacCont'];
$telCont = $_POST['telCont'];
$idUsuario = $_POST['idUsuario'];

try {
    //code...

    $q = "UPDATE `usuario` SET `contrasenia`='$contra',`direccion`='$direccion',`telefono`='$tel',`edoCivil`='$edoCivil' WHERE `idUsuario` = '$idUsuario'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    $q = "UPDATE `contacto` SET `nombreCont`='$nombreCont',`correoCont`='$correoCont',`telefonoCont`='$telCont',`fechaNacCont`='$fechaNacCont' WHERE `idContacto` = '$idUsuario'";
    $res = $conexion->query($q) or die(print($conexion->errorInfo()));

    echo "Exitoso";

} catch (PDOException $th) {
    //throw $th;
    echo $th->getMessage();
    die();
}