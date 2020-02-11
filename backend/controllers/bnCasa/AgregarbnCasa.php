<?php
session_start();
  require_once "../../class/conexion.php";
  require_once "../../class/bnCasa.php";
  $obj = new BnCasa();

  $datos= array(
      $_POST['nuc_bnc'],
      $_POST['rcd_bnc'],
      $_POST['nom_bnc'],
      $_POST['cor_bnc']
  );

  echo $obj->AgregarBnCasa($datos); 
?>