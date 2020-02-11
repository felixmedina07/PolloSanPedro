<?php
  require_once "conexion.php"; 
 class BnCasa extends Conectar{
   public function AgregarBnCasa($datos){
       $conexion = Conectar::conexion();
       $cre_bnc=date("Y-m-d h:i:s");
       $idusuario= $_SESSION['idUsuario'];
       $num_cuen =$datos[0];
       if($this->buscarbnCasa($num_cuen) == 1){
         return 0;
       }else{
        $sql ="INSERT INTO  bancos_casa(nuc_bnc,
                            rcd_bnc,
                            nom_bnc,
                            cor_bnc,
                            est_bnc,
                            cod_usu,
                            cre_bnc)
               VALUES ('$datos[0]','$datos[1]', '$datos[2]', '$datos[3]','A','$idusuario','$cre_bnc')";
              return mysqli_query($conexion,$sql);
       }
      
   }

   public function buscarbnCasa($num){
    $conexion = Conectar::conexion();
    $sql = "SELECT * FROM bancos_casa WHERE nuc_bnc='$num'";
    $result= mysqli_query($conexion,$sql);
    if(mysqli_num_rows($result) > 0){
      echo "<script>alert('$sql')</script>"; 
      return 1;
    }else{
        return 0;
    }
   }

   public function ObtenerBnCasa($idbanc){
      $conexion = Conectar::conexion();
      $sql="SELECT cod_bnc,nuc_bnc,rcd_bnc,nom_bnc,cor_bnc FROM bancos_casa WHERE cod_bnc ='$idbanc'";
      $result=mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result);
      $datos=array(
        'cod_bnc' => $ver[0],
        'nom_bnc' => $ver[3],
        'nuc_bnc' => $ver[1],
        'rcd_bnc' => $ver[2],
        'cor_bnc' => $ver[4] 
      );
      return $datos;
   }

   public function actualizabnCasa($datos){
    $conexion = Conectar::conexion();
    $upd_bnc = date("Y-m-d h:i:s");
    $sql="UPDATE bancos_casa SET nuc_bnc='$datos[2]',rcd_bnc='$datos[3]',nom_bnc='$datos[1]',cor_bnc='$datos[4]',upd_bnc='$upd_bnc' WHERE cod_bnc='$datos[0]'";
    $d=mysqli_query($conexion,$sql);
    if($d){
      return 1;
    } else{
      // echo "<script>alert('$sql')</script>";
      return 0;
    }
    
}
 
  public function papelera($idbanc){
    $conexion = Conectar::conexion();
    $del_bnc = date("Y-m-d h:i:s");
    $sql="UPDATE bancos_casa  SET del_bnc ='$del_bnc', est_bnc='B' WHERE cod_bnc='$idbanc'";
    $d=mysqli_query($conexion,$sql);
    if($d){
      return 1;
    } else{
      // echo "<script>alert('$sql')</script>";
      return 0;
    }
  }

   public function eliminarbnCasa($idbanc){
    $conexion = Conectar::conexion();
    $sql="DELETE FROM bancos_casa WHERE cod_bnc='$idbanc'";
    return mysqli_query($conexion,$sql);

  }
 
 
  public function restaurar($idbanc){
   $conexion = Conectar::conexion();
   $res_bnc=date("Y-m-d h:i:s");
   $sql="UPDATE bancos_casa SET res_bnc ='$res_bnc', est_bnc='A' WHERE cod_bnc='$idbanc'";
   $d=mysqli_query($conexion,$sql);
   if($d){
     return 1;
   } else{
     // echo "<script>alert('$sql')</script>";
     return 0;
   }
   }
  }


?>