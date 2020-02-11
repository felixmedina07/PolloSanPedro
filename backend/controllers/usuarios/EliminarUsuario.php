<?php
require_once "../../class/conexion.php";
require_once "../../class/usuarios.php";
$objs = new Usuario();

echo $objs->eliminarUsuario($_POST['idusuario']);

?>