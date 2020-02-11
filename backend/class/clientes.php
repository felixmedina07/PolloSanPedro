<?php 
 require_once "conexion.php";
 class Cliente extends Conectar {
   public function agregarCliente($datos){
     $conexion = Conectar::conexion();
     $idusuario=$_SESSION['idUsuario'];
     $cre_cli=date("Y-m-d h:i:s");
     $ced_cli = $datos[2];
     $cor_cli = $datos[5];
       if($this->buscarCliente($ced_cli,$cor_cli)){
         return 0;
       }else{
        $sql="INSERT INTO cliente(nom_cli,
                                  ape_cli,
                                  ced_cli,
                                  rif_cli,
                                  ads_cli,
                                  cor_cli,
                                  tel_cli,
                                  est_cli,
                                  cod_usu,
                                  cre_cli) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','A','$idusuario','$cre_cli');";
        return mysqli_query($conexion,$sql);
       }
   }

   public function buscarCliente($ced,$correo){
    $conexion = Conectar::conexion();
    $sql="SELECT * FROM cliente WHERE ced_cli='$ced' or cor_cli='$correo'";
    $result= mysqli_query($conexion,$sql);
    if(mysqli_num_rows($result) > 0){
      echo "<script>alert('$sql')</script>"; 
      return 1;
    }else{
        return 0;
    }
  }

   public function obtenDatosCliente($idcliente){
    $conexion = Conectar::conexion();
    $sql="SELECT cod_cli,nom_cli,ape_cli,ced_cli,rif_cli,ads_cli,cor_cli,tel_cli FROM cliente WHERE cod_cli ='$idcliente'";
    $result=mysqli_query($conexion,$sql);
    $ver=mysqli_fetch_row($result);

    $datos=array(
        'cod_cli' => $ver[0],
        'nom_cli' => $ver[1],
        'ape_cli' => $ver[2],
        'ced_cli' => $ver[3],
        'rif_cli' => $ver[4],
        'ads_cli' => $ver[5],
        'cor_cli' => $ver[6],
        'tel_cli' => $ver[7]
    );
    return $datos;
}

public function actualizaCliente($datos){
    $conexion = Conectar::conexion();
    $upd_cli = date("Y-m-d h:i:s");
    $sql="UPDATE cliente SET nom_cli='$datos[1]',ape_cli='$datos[2]',ced_cli='$datos[3]',rif_cli='$datos[4]',ads_cli='$datos[5]',cor_cli='$datos[6]',tel_cli='$datos[7]',upd_cli='$upd_cli' WHERE cod_cli='$datos[0]'";
    return mysqli_query($conexion,$sql); 
    
}

public function papelera($idcliente){
  $conexion = Conectar::conexion();
  $del_cli = date("Y-m-d h:i:s");
  $sql="UPDATE cliente SET del_cli ='$del_cli', est_cli='B' WHERE cod_cli='$idcliente'";
  $d=mysqli_query($conexion,$sql);
  if($d){
    return 1;
  } else{
    // echo "<script>alert('$sql')</script>";
    return 0;
  }
}

public function eliminarCliente($idcliente){
    $conexion = Conectar::conexion();
    $sql="DELETE FROM cliente WHERE cod_cli='$idcliente'";
    return mysqli_query($conexion,$sql);

}

public function restaurar($idcliente){
  $conexion = Conectar::conexion();
  $res_cli = date("Y-m-d h:i:s");
  $sql="UPDATE cliente SET res_cli ='$res_cli', est_cli='A' WHERE cod_cli='$idcliente'";
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