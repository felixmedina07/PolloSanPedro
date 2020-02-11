<?php
require_once "conexion.php";
 class Dia extends Conectar{
     public function agregarDia($fecha){
      $conexion= Conectar::conexion();
      $cre_dia=date("Y-m-d h:i:s");
      $idusuario= $_SESSION['idUsuario'];
      $sql="INSERT INTO dia (fec_dia,cod_usu,est_dia,cre_dia)
            VALUES ('$fecha','$idusuario','A','$cre_dia')";
       return mysqli_query($conexion,$sql);     
     } 
     public function obtenerDia($iddia){
        $conexion= Conectar::conexion();
        $sql="SELECT cod_dia,fec_dia FROM dia WHERE cod_dia='$iddia'";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);

         $datos=array(
            'cod_dia' => $ver[0],
            'fec_dia' => $ver[1]
         );
         return $datos;
     }

     public function actualizarDia($datos){
        $conexion= Conectar::conexion();
        $upd_dia=date("Y-m-d h:i:s");
        $sql="UPDATE dia SET fec_dia='$datos[1]',upd_dia='$upd_dia' WHERE cod_dia='$datos[0]' ";
        $d=mysqli_query($conexion,$sql);
         if($d){
            return 1;
         } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
         }
     }

     public function papelera($iddia){
        $conexion= Conectar::conexion();
        $del_dia = date("Y-m-d h:i:s");
        $sql="UPDATE dia SET del_dia ='$del_dia', est_dia='B' WHERE cod_dia='$iddia'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
        }
     } 

     public function eliminarDia($iddia){
        $conexion= Conectar::conexion();
        $sql="DELETE FROM dia WHERE cod_dia='$iddia'";
        return mysqli_query($conexion,$sql);
     }

     public function restaurar($iddia){
      $conexion= Conectar::conexion();
      $res_dia = date("Y-m-d h:i:s");
      $sql="UPDATE dia SET res_dia ='$res_dia', est_dia='A' WHERE cod_dia='$iddia'";
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