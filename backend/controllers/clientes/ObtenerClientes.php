<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/clientes.php";
 $obj = new Cliente();
 $idcliente =$_POST['idcliente'];
 echo json_encode($obj->obtenDatosCliente($idcliente));
//  echo json_encode($obj->obtenDatosCliente());
?>
