<?php
require_once "../../class/conexion.php";
require_once "../../class/bnClientes.php";
$objs = new BnCliente();

echo $objs->papelera($_POST['idbank']);

?>