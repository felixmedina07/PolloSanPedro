<?php
require_once "conexion.php";
class Cuadre extends Conectar{
    
    public function agregaCuadres($datos){
      $conexion = Conectar::conexion();
      $cre_cua=date("Y-m-d h:i:s");
      $idusuario=$_SESSION['idUsuario'];
      $sql="INSERT INTO cuadres(cpo_cua,
                                cpa_cua,
                                cal_cua,
                                cmo_cua,
                                pre_cua,
                                est_cua,
                                cod_cli,
                                cod_des,
                                cod_pro,
                                cod_usu,
                                cre_cua) 
            VALUES ('$datos[0]',
                    '$datos[1]',
                    '$datos[2]',
                    '$datos[3]',
                    '$datos[4]',
                    'A',
                    '$datos[5]',
                    '$datos[6]',
                    '$datos[7]',
                    '$idusuario',
                    '$cre_cua') ";
      $re=mysqli_query($conexion,$sql);
      if($re){
          $sql="UPDATE productos SET cpo_pro='$datos[8]', cpa_pro='$datos[9]',cal_pro='$datos[10]',cmo_pro='$datos[11]' WHERE est_pro='A'";
          $re2 = mysqli_query($conexion,$sql);
          }if($re2){
           $sql="UPDATE despacho SET est_des='B' WHERE cod_des='$datos[6]'";
           return mysqli_query($conexion,$sql);
           return 1;
          }else{
              echo "<script>alert('$sql')</script";
              return 0;
          }

    }

    public function papelera($idcuadre){
      $conexion=Conectar::conexion();
        $del_cua = date("Y-m-d h:i:s");
        $sql="UPDATE cuadres SET del_cua ='$del_cua', est_cua='B' WHERE cod_cua='$idcuadre'";
        $d=mysqli_query($conexion,$sql);
        if($d){
            return 1;
        } else{
            // echo "<script>alert('$sql')</script>";
            return 0;
        }
    }

    public function restaurar($idcuadre){
      $conexion=Conectar::conexion();
      $res_cua = date("Y-m-d h:i:s");
      $sql="UPDATE cuadres SET res_cua ='$res_cua', est_cua='A' WHERE cod_cua='$idcuadre'";
      $d=mysqli_query($conexion,$sql);
      if($d){
          return 1;
      } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
      }
    }

    public function obtenerDatoDespacho($iddespacho){
        $conexion=Conectar::conexion();
        $sql=" SELECT cpo_des,cpa_des,cal_des,cmo_des,pre_des FROM despacho WHERE cod_des ='$iddespacho' AND est_des='A' ";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result);
        $datos =array(
            'cpo_des' => $ver[0],
            'cpa_des' => $ver[1],
            'cal_des' => $ver[2],
            'cmo_des' => $ver[3],
            'pre_des' => $ver[4]
        );
        return $datos;
    }

    public function eliminarCuadres($idcuadre){
      $conexion = Conectar::conexion();
        $sql="DELETE FROM cuadres WHERE cod_cua='$idcuadre'";
        $d = mysqli_query($conexion,$sql);
        if($d){
          return 1;
        }else{
            return 0;
        }
    }
}

?>