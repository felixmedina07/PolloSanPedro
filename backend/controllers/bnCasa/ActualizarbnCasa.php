<?php
 session_start();
 require_once "../../class/conexion.php";
 require_once "../../class/bnCasa.php";
 $obj = new BnCasa();
 $datos = array(
     $_POST['idbanc'],
     $_POST['nom_bncU'],
     $_POST['nuc_bncU'],
     $_POST['rcd_bncU'],
     $_POST['cor_bncU']
 );

echo $obj->actualizabnCasa($datos);

?>