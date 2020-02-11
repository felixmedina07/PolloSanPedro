<?php
require_once "../../class/conexion.php";
require_once "../../class/cuadres.php";
$obj = new Cuadre();
echo $obj->restaurar($_POST['idcuadre']);
?>