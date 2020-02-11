<?php
 session_start();
 require_once "../../class/conexion.php";
 require_once "../../class/bnClientes.php";
 $obj = new BnCliente();
 $datos = array(
     $_POST['idbank'],
     $_POST['bnClienteSelectU'],
     $_POST['not_bnkU'],
     $_POST['ncu_bnkU'],
     $_POST['tpc_bnkU'],
     $_POST['rcd_bnkU'],
     $_POST['nom_bnkU'],
     $_POST['cor_bnkU'],
     $_POST['tti_bnkU']
 );

echo $obj->actualizarbnCliente($datos);

?>