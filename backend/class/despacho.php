<?php
require_once "conexion.php";
class Despacho extends Conectar{
    public function agregarDespacho($datos){
        $conexion=Conectar::conexion();
        $cre_des=date("Y-m-d h:i:s");
        $idusuario=$_SESSION['idUsuario'];
        $fecha = date("Y-m-d");
        $sql="SELECT cod_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro FROM productos WHERE est_pro='A'";                
        $result= mysqli_query($conexion,$sql);
        $total=mysqli_fetch_array($result);
        if($total['cpo_pro'] <= 0 || $total['cpa_pro'] <= 0 || $total['cal_pro'] <= 0 || $total['cmo_pro'] <= 0){
            return 0;
        }else{
            $sql="INSERT INTO despacho( pre_des,
                                    prd_des,
                                    cpo_des,
                                    cpa_des,
                                    cal_des,
                                    cmo_des,
                                    pok_des,
                                    pak_des,
                                    alk_des,
                                    mok_des,
                                    ppo_des,
                                    ppa_des,
                                    pal_des,
                                    pmo_des,
                                    est_des,
                                    cod_pro,
                                    cod_cli,
                                    cod_usu,
                                    fec_des,
                                    cre_des) 
                     VALUES('$datos[0]',
                            '$datos[1]',
                            '$datos[2]',
                            '$datos[3]',
                            '$datos[4]',
                            '$datos[5]',
                            '$datos[6]',
                            '$datos[7]',
                            '$datos[8]',
                            '$datos[9]',
                            '$datos[10]',
                            '$datos[11]',
                            '$datos[12]',
                            '$datos[13]',
                            '$datos[14]',
                            '$datos[15]',
                            '$datos[16]',
                            '$idusuario',
                            '$fecha',
                            '$cre_des')";
        $re = mysqli_query($conexion,$sql);
        if($re){
            $sql2="UPDATE productos  SET cpo_pro ='$datos[17]',cpa_pro='$datos[18]',cal_pro='$datos[19]',cmo_pro='$datos[20]' WHERE est_pro='A'";
             return mysqli_query($conexion,$sql2);
            return 1;
        }else{
            echo "<script>alert('$sql')</script";
            return 0;
        }     
        }
    }


    public function papelera($iddespacho){
        $conexion = Conectar::conexion();
        $del_des = date("Y-m-d h:i:s");
        $sql="UPDATE despacho SET del_des ='$del_des', est_des='B' WHERE cod_des='$iddespacho'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
        }
    }

    public function restaurar($iddespacho){
        $conexion = Conectar::conexion();
        $res_des = date("Y-m-d h:i:s");
        $sql="UPDATE despacho SET res_des ='$res_des', est_des='A' WHERE cod_des='$iddespacho'";
        $d=mysqli_query($conexion,$sql);
        if($d){
          return 1;
        } else{
          // echo "<script>alert('$sql')</script>";
          return 0;
        }
    }


    public function eliminarDespacho($iddespacho){
        $conexion = Conectar::conexion();
        $sql="DELETE FROM despacho WHERE cod_des='$iddespacho'";
        $d =mysqli_query($conexion,$sql);
        if($d){
            return 1;
        }else{
            return 0;
        }
    }

    public function actualizarSDespacho($datos){
        $conexion = Conectar::conexion();
        $idusuario=$_SESSION['idUsuario'];
        $upd_des=date("Y-m-d h:i:s");
        $sql="UPDATE despacho 
              SET pre_des='$datos[0]', 
                  prd_des='$datos[1]',
                  cpo_des='$datos[2]',
                  cpa_des='$datos[3]',
                  cal_des='$datos[4]',
                  cmo_des='$datos[5]',
                  pok_des='$datos[6]',
                  pak_des='$datos[7]',
                  alk_des='$datos[8]',
                  mok_des='$datos[9]',
                  ppo_des='$datos[10]',
                  ppa_des='$datos[11]',
                  pal_des='$datos[12]',
                  pmo_des='$datos[13]',
                  cod_pro='$datos[14]',
                  cod_cli='$datos[15]',
                  cod_usu='$idusuario',
                  upd_des='$upd_des'
             WHERE cod_des='$datos[16]'";  
        $re = mysqli_query($conexion,$sql);
        if($re){
            $sql2="UPDATE productos SET cpo_pro ='$datos[17]',cpa_pro='$datos[18]',cal_pro='$datos[19]',cmo_pro='$datos[20]' WHERE cod_pro='A'";
             return mysqli_query($conexion,$sql2);
            return 1;
        }else{
            echo "<script>alert('$sql')</script";
            return 0;
        }       
    }

    public function actualizarRDespacho($datos){
        $conexion = Conectar::conexion();
        $idusuario=$_SESSION['idUsuario'];
        $upd_des=date("Y-m-d h:i:s");
        $sql="UPDATE despacho 
              SET pre_des='$datos[0]', 
                  prd_des='$datos[1]',
                  cpo_des='$datos[2]',
                  cpa_des='$datos[3]',
                  cal_des='$datos[4]',
                  cmo_des='$datos[5]',
                  pok_des='$datos[6]',
                  pak_des='$datos[7]',
                  alk_des='$datos[8]',
                  mok_des='$datos[9]',
                  ppo_des='$datos[10]',
                  ppa_des='$datos[11]',
                  pal_des='$datos[12]',
                  pmo_des='$datos[13]',
                  cod_pro='$datos[14]',
                  cod_cli='$datos[15]',
                  cod_usu='$idusuario',
                  upd_des='$upd_des'
             WHERE cod_des='$datos[16]'";  
        $re = mysqli_query($conexion,$sql);
        if($re){
            $sql3="UPDATE productos SET cpo_pro ='$datos[17]',cpa_pro='$datos[18]',cal_pro='$datos[19]',cmo_pro='$datos[20]' WHERE est_pro='A'";
             return mysqli_query($conexion,$sql3);
            return 1;
        }else{
            echo "<script>alert('$sql')</script";
            return 0;
        }      
    }


}
?>