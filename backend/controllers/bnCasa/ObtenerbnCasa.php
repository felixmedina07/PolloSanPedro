<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/bnCasa.php";
 $obj = new BnCasa();
 $idbanc =$_POST['idbanc'];
 echo json_encode($obj->ObtenerBnCasa($idbanc));
//  echo json_encode($obj->obtenDatosCliente());
?>