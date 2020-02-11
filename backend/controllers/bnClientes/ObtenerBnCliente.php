<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/bnClientes.php";
 $obj = new BnCliente();
 $idbank =$_POST['idbank'];
 echo json_encode($obj->obtenerbnCliente($idbank));
//  echo json_encode($obj->obtenDatosCliente());
?>