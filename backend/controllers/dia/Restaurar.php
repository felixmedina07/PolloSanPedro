<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/dia.php";

$obj= new Dia();

 $iddia =$_POST['iddia'];
 echo $obj->restaurar($iddia);
//  echo json_encode($obj->obtenDatosCliente());
?>