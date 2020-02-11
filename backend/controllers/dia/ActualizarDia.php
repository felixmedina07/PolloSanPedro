<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/dia.php";

$obj= new Dia();

$datos= array(
    $_POST['iddia'],
    $_POST['fec_diaU']
);
echo $obj->actualizarDia($datos);

?>