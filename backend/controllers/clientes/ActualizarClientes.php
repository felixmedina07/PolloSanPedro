<?php
 session_start();
 require_once "../../class/conexion.php";
 require_once "../../class/clientes.php";
 $obj = new Cliente();
 $datos = array(
     $_POST['idcliente'],
     $_POST['nom_cliU'],
     $_POST['ape_cliU'],
     $_POST['ced_cliU'],
     $_POST['rif_cliU'],
     $_POST['ads_cliU'],
     $_POST['cor_cliU'],
     $_POST['tel_cliU'],
 );



 echo $obj->actualizaCliente($datos);


?>