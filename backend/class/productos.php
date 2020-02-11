<?php
require_once "conexion.php";

class Producto extends Conectar {
  public function agregarProducto($datos){
    $conexion = Conectar::conexion();
    $cre_pro= date("Y-m-d h:i:s");
    $idusuario= $_SESSION['idUsuario'];
    $sql="INSERT INTO productos( tas_pro, 
                                 tpo_pro, 
                                 tpa_pro,
                                 tmo_pro,
                                 tal_pro,
                                 ppo_pro,
                                 ppa_pro,
                                 pal_pro,
                                 pmo_pro,
                                 csp_pro,
                                 ces_pro,
                                 prp_pro,
                                 cpo_pro,
                                 cpa_pro,
                                 cal_pro,
                                 cmo_pro,
                                 est_pro,
                                 cod_usu,
                                 cre_pro) 
             VALUES('$datos[0]',
                    '$datos[1]',
                    '$datos[2]',
                    '$datos[3]',
                    '$datos[4]',
                    '$datos[5]',
                    '$datos[6]',
                    '$datos[7]',
                    '$datos[8]',
                    '$datos[15]',
                    '$datos[9]',
                    '$datos[10]',
                    '$datos[11]',
                    '$datos[12]',
                    '$datos[13]',
                    '$datos[14]',
                    'A',
                    '$idusuario',
                    '$cre_pro')"; 
    $d = mysqli_query($conexion,$sql);
    if($d){
        return 1;
    }else{
        echo "<script>alert('$sql')</script";
        return 0;
    }                
  }

  public function ObtenerProducto($idproducto){
    $conexion = Conectar::conexion();
    $sql ="SELECT cod_pro,
                  tas_pro,
                  tpo_pro,
                  tpa_pro,
                  tmo_pro,
                  tal_pro,
                  csp_pro,
                  ces_pro,
                  prp_pro,
                  cpo_pro,
                  cpa_pro,
                  cal_pro,
                  cmo_pro FROM productos WHERE cod_pro = '$idproducto'";
    $result= mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($result);
    
    $datos=array(
        'cod_pro' => $ver[0],
        'tas_pro' => $ver[1],
        'tpo_pro' => $ver[2],
        'tpa_pro' => $ver[3],
        'tmo_pro' => $ver[4],
        'tal_pro' => $ver[5],
        'csp_pro' => $ver[6],
        'ces_pro' => $ver[7],
        'prp_pro' => $ver[8], 
        'cpo_pro' => $ver[9],
        'cpa_pro' => $ver[10],
        'cal_pro' => $ver[11],
        'cmo_pro' => $ver[12]
    );
    return $datos;
}

public function ActualizarProducto($datos){
 $conexion = Conectar::conexion();
 $upd_pro = date("Y-m-d h:i:s");
 $sql="UPDATE productos SET tas_pro ='$datos[1]',
                            tpo_pro ='$datos[2]',
                            tpa_pro ='$datos[3]',
                            tmo_pro ='$datos[4]',
                            tal_pro ='$datos[5]',
                            ppo_pro ='$datos[6]',
                            ppa_pro ='$datos[7]',
                            pal_pro ='$datos[8]',
                            pmo_pro ='$datos[9]',
                            csp_pro ='$datos[10]',
                            ces_pro ='$datos[11]',
                            prp_pro ='$datos[12]', 
                            cpo_pro ='$datos[13]',
                            cpa_pro ='$datos[14]',
                            cal_pro ='$datos[15]',
                            cmo_pro ='$datos[16]',
                            upd_pro = '$upd_pro'
       WHERE cod_pro='$datos[0]'";
 $d = mysqli_query($conexion,$sql);
 if($d){
  return 1;
 }else {
   echo "<script>alert('$sql')</script>";
   return 0;
 }                       
}

public function papelera($idproducto){
    $conexion = Conectar::conexion();
    $del_pro = date("Y-m-d h:i:s");
    $sql="UPDATE productos  SET del_pro ='$del_pro', est_pro='B' WHERE cod_pro='$idproducto'";
    $d=mysqli_query($conexion,$sql);
    if($d){
      return 1;
    } else{
      // echo "<script>alert('$sql')</script>";
      return 0;
    }
  }

public function EliminarProducto($idproducto){
    $conexion = Conectar::conexion();
    $sql="DELETE FROM productos WHERE cod_pro='$idproducto'";
    $d =mysqli_query($conexion,$sql);
    if($d){
        return 1;
    }else{
        return 0;
    }
}

public function restaurar($idproducto){
  $conexion = Conectar::conexion();
  $res_pro = date("Y-m-d h:i:s");
  $sql="UPDATE productos  SET res_pro ='$res_pro', est_pro='A' WHERE cod_pro='$idproducto'";
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