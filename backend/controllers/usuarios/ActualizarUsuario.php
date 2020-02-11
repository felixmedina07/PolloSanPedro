<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/usuarios.php";
$obj = new Usuario();
$datos = array(
    $_POST['idusuario'],
    $_POST['nom_usuU'],
    $_POST['ema_usuU'],
    $_POST['rol_usuU']
);

echo $obj->actualizarDatoUsuario($datos);

?>