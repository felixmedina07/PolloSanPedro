<?php
require_once "../../class/conexion.php";
require_once "../../class/clientes.php";
$objs = new Cliente();

echo $objs->papelera($_POST['idcliente']);

?>