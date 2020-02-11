<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/bnClientes.php";
$obj = new BnCliente();
$nomtitular = $_POST['not_bnk'];
$idcliente = $_POST['bnClienteSelect'];

    $datos = array(
      $nomtitular,  
      $_POST['ncu_bnk'],
      $_POST['tpc_bnk'],
      $_POST['rcd_bnk'],
      $_POST['nom_bnk'],
      $_POST['cor_bnk'],
      $_POST['tti_bnk'],
      $idcliente
    );

                
echo $obj->agregarbnCliente($datos);

?>
