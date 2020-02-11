<?php

    require_once "../../class/usuarios.php";
    
   $password=sha1($_POST['pas_usu']);
   
   $datos=array(
    $_POST['nom_usu'],
     $_POST['ema_usu'],
     $password,
     $_POST['rol_usu']
   );

   $usuario = new Usuario();
   echo $usuario->agregarUsuario($datos);

?>