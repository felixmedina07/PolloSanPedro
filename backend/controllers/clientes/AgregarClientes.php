<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/clientes.php";
$obj= new Cliente();
 
$datos= array(
    $_POST['nom_cli'],
    $_POST['ape_cli'],
    $_POST['ced_cli'],
    $_POST['rif_cli'],
    $_POST['ads_cli'],
    $_POST['cor_cli'],
    $_POST['tel_cli'],
);

echo $obj->agregarCliente($datos);
?>