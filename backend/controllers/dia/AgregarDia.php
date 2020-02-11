<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/dia.php";

$obj= new Dia();

echo $obj->agregarDia($_POST['fec_dia']); 
?>