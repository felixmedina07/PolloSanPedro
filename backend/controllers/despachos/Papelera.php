<?php
 require_once "../../class/conexion.php";
 require_once "../../class/despacho.php";
 $obj = new Despacho();

 echo json_encode($obj->papelera($_POST['iddespacho']));
?>