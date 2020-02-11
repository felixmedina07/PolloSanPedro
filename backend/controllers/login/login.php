<?php
session_start();
  require_once "../../class/usuarios.php";

  $nom_usu=$_POST['nom_usu'];
  $password=sha1($_POST['pas_usu']);
 
  $usuarioObj= new Usuario();
  echo $usuarioObj->login($nom_usu , $password);
?>