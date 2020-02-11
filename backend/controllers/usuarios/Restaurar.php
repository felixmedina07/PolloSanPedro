<?php
require_once "../../class/conexion.php";
require_once "../../class/usuarios.php";
$obj = new Usuario();

echo $obj->restaurar($_POST['idusuario']);
