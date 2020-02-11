<?php
require_once "../../class/conexion.php";
require_once "../../class/clientes.php";
$objs = new Cliente();

echo $objs->eliminarCliente($_POST['idcliente']);

?>