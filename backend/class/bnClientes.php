<?php 
require_once "conexion.php";
class BnCliente extends Conectar{
    public function agregarbnCliente($datos){
        $conexion = Conectar::conexion();
        $cre_bnk=date("Y-m-d h:i:s");
        $idusuario=$_SESSION['idUsuario'];
        $num =$datos[1];
        if($this->buscarCliente($num)){
          return 0;
        }else{
          $sql=" INSERT INTO  bancos_cliente (
                              not_bnk,
                              ncu_bnk,
                              tpc_bnk,
                              rcd_bnk,
                              nom_bnk,
                              cor_bnk,
                              tti_bnk,
                              est_bnk,
                              cod_cli,
                              cod_usu,
                              cre_bnk)  
              VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','A','$datos[7]','$idusuario','$cre_bnk');";
              return mysqli_query($conexion,$sql);
               
        }        
    }

    public function buscarCliente($num){
      $conexion = Conectar::conexion();
      $sql="SELECT * FROM bancos_cliente WHERE ncu_bnk='$num'";
      $result= mysqli_query($conexion,$sql);
      if(mysqli_num_rows($result) > 0){
        echo "<script>alert('$sql')</script>"; 
        return 1;
      }else{
          return 0;
      }
    }

    public function obtenerbnCliente($idbank){
      $conexion = Conectar::conexion();
      $sql="SELECT cod_bnk,not_bnk,ncu_bnk,tpc_bnk,rcd_bnk,nom_bnk,cor_bnk,tti_bnk,cod_cli FROM bancos_cliente WHERE cod_bnk ='$idbank'";
      $result = mysqli_query($conexion,$sql);
      $ver=mysqli_fetch_row($result);

      $datos=array(
          'cod_bnk' => $ver[0],
          'cod_cli' => $ver[8],
          'not_bnk' => $ver[1],
          'ncu_bnk' => $ver[2],
          'tpc_bnk' => $ver[3],
          'rcd_bnk' => $ver[4],
          'nom_bnk' => $ver[5],
          'cor_bnk' => $ver[6],
          'tti_bnk' => $ver[7]
      );
      return $datos;
    }

    public function actualizarbnCliente($datos){
      $conexion = Conectar::conexion();
      $upd_bnk = date("Y-m-d h:i:s");
      $sql="UPDATE bancos_cliente SET not_bnk='$datos[2]',
                                      ncu_bnk='$datos[3]',
                                      tpc_bnk='$datos[4]',
                                      rcd_bnk='$datos[5]',
                                      nom_bnk='$datos[6]',
                                      cor_bnk='$datos[7]',
                                      tti_bnk='$datos[8]',
                                      cod_cli='$datos[1]',upd_bnk='$upd_bnk' WHERE cod_bnk = '$datos[0]'";
      $d=mysqli_query($conexion,$sql);
      if($d){
        return 1;
      } else{
         echo "<script>alert('$sql')</script>";
        return 0;
      }
    }
    
    public function papelera($idbank){
      $conexion = Conectar::conexion();
      $del_bnk = date("Y-m-d h:i:s");
      $sql="UPDATE bancos_cliente  SET del_bnk ='$del_bnk', est_bnk='B' WHERE cod_bnk='$idbank'";
      $d=mysqli_query($conexion,$sql);
      if($d){
        return 1;
      } else{
        // echo "<script>alert('$sql')</script>";
        return 0;
      }
    }

    public function eliminarbnCliente($idbank){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM bancos_cliente WHERE cod_bnk='$idbank'";
        return mysqli_query($conexion,$sql);

    }

    public function restaurar($idbank){
      $conexion = Conectar::conexion();
      $res_bnk = date("Y-m-d h:i:s");
      $sql="UPDATE bancos_cliente  SET res_bnk ='$res_bnk', est_bnk='A' WHERE cod_bnk='$idbank'";
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