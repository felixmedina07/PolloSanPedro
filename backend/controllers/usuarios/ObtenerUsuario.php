<?php 
 require_once "../../class/conexion.php";
 require_once "../../class/usuarios.php";
 $obj = new Usuario();
 $idusuario =$_POST['idusuario'];
 echo json_encode($obj->obtenerDatoUsuario($idusuario));
//  echo json_encode($obj->obtenDatosCliente());
?>
