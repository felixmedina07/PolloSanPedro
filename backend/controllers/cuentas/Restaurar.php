<?php
require_once "../../class/conexion.php";
require_once "../../class/cuentas.php";
$objs = new Cuenta();

echo $objs->restaurar($_POST['idcuenta']);

?>