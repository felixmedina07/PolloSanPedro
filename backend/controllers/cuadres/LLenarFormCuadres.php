<?php
require_once "../../class/conexion.php";
require_once "../../class/cuadres.php";
$obj = new Cuadre();
$iddespacho =$_POST['iddespacho'];
echo json_encode($obj->obtenerDatoDespacho($iddespacho));
?>