<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/dia.php";

$obj= new Dia();

 $iddia =$_POST['iddia'];
 echo $obj->papelera($iddia);
//  echo json_encode($obj->obtenDatosCliente());
?>