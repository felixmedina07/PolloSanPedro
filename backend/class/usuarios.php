<?php
require_once "Conexion.php";
class Usuario extends Conectar{
  public function agregarUsuario($datos){
    $conexion = Conectar::conexion();
    $cre_usu=date("Y-m-d h:i:s");
    $nom_usu =$datos[0];
    if(self::buscarUsuarioRepetido($nom_usu)){
        return 2;
    }else{
        $sql="INSERT INTO usuarios(nom_usu,
                                   ema_usu,
                                   pas_usu,
                                   rol_usu,
                                   est_usu,
                                   cre_usu)
              VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','A','$cre_usu')";
        return  mysqli_query($conexion,$sql);                          
    }
  }

  public function buscarUsuarioRepetido($nom_usu){
    $conexion = Conectar::conexion();
    $sql="SELECT nom_usu FROM usuarios WHERE nom_usu = '$nom_usu'";
    $result= mysqli_query($conexion,$sql);
    $datos= mysqli_fetch_array($result);
    if($datos['nom_usu'] != "" || $datos['nom_usu']==$nom_usu){
      return 1;
    }else{
        return 0;
    }
  }

  public function login($nom_usu, $password){
   $conexion=Conectar::conexion();
   $sql = "SELECT * FROM usuarios WHERE nom_usu='$nom_usu' and pas_usu='$password' and est_usu='A'";
   $result=mysqli_query($conexion,$sql);
   if(mysqli_num_rows($result) > 0){
    $_SESSION['nom_usu']=$nom_usu;
    $_SESSION['idUsuario']=self::traeID($nom_usu,$password);   
    $_SESSION['rol'] =self::traeRol($nom_usu,$password);  
    $las_usu = date("Y-m-d h:i:s");
    $sql="UPDATE usuarios SET las_usu = '$las_usu' WHERE nom_usu = '$nom_usu'";
    $result = mysqli_query($conexion,$sql);
    if($result){
        return 1;
    }else{
        return 0;
    }
   }
   }    

  public function traeID($nom_usu,$password){
    $conexion=Conectar::conexion();
    $password=sha1($_POST['pas_usu']);
    $sql ="SELECT cod_usu
    FROM usuarios
    WHERE nom_usu= '$nom_usu' 
    AND pas_usu= '$password'";
    $result= mysqli_query($conexion,$sql);
    return mysqli_fetch_row($result)[0];
}

public function traeRol($nom_usu,$password){
  $conexion=Conectar::conexion();
  $sql ="SELECT rol_usu
        FROM usuarios
        WHERE nom_usu= '$nom_usu' 
        AND pas_usu= '$password'";
  $result= mysqli_query($conexion,$sql);
  return mysqli_fetch_row($result)[0];
}


public function obtenerDatoUsuario($idusuario){
 $conexion= Conectar::conexion();
 $sql="SELECT cod_usu,nom_usu,ema_usu,rol_usu FROM usuarios WHERE cod_usu='$idusuario'";
 $result=mysqli_query($conexion,$sql);
 $ver=mysqli_fetch_row($result);

 $datos=array(
   'cod_usu' => $ver[0],
   'nom_usu' => $ver[1],
   'ema_usu' => $ver[2],
   'rol_usu' => $ver[3]
 );
 return $datos;
}

public function actualizarDatoUsuario($datos){
  $conexion = Conectar::conexion();
    $upd_usu = date("Y-m-d h:i:s");
    $sql="UPDATE usuarios SET nom_usu='$datos[1]',ema_usu='$datos[2]',rol_usu='$datos[3]',upd_usu='$upd_usu' WHERE cod_usu='$datos[0]'";
    return mysqli_query($conexion,$sql); 
}

public function Papelera($idusuario){
  $conexion = Conectar::conexion();
  $del_usu = date("Y-m-d h:i:s");
  $sql="UPDATE usuarios SET del_usu ='$del_usu', est_usu='B' WHERE cod_usu='$idusuario'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    // echo "<script>alert('$sql')</script>";
    return 0;
  }
}

public function eliminarUsuario($idusuario){
  $conexion = Conectar::conexion();
  $sql="DELETE FROM usuarios WHERE cod_usu='$idusuario'";
  return mysqli_query($conexion,$sql);

}

public function restaurar($idusuario){
  $conexion = Conectar::conexion();
  $res_usu = date("Y-m-d h:i:s");
  $sql="UPDATE usuarios SET res_usu ='$res_usu', est_usu='A' WHERE cod_usu='$idusuario'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    // echo "<script>alert('$sql')</script>";
    return 0;
  }
}

}

// echo date("d-m-y h:m:s");

?>