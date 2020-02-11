<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/dia.php";

$obj= new Dia();

 $iddia =$_POST['iddia'];
 echo json_encode($obj->eliminarDia($iddia));
//  echo json_encode($obj->obtenDatosCliente());
?>
