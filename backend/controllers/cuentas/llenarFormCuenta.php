<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/cuentas.php";
 $obj = new Cuenta();
 $iddespacho =$_POST['iddespacho'];
 echo json_encode($obj->obtenerDatoDespacho($iddespacho));
//  echo json_encode($obj->obtenDatosCliente());
?>
