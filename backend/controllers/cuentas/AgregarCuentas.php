<?php 
session_start();
 require_once "../../class/conexion.php";
 require_once "../../class/cuentas.php";
 $obj = new Cuenta();
 
 $idbank=$_POST['bnbClienteSelect'];
 $idbanc=$_POST['bnCasaSelect'];
 $iddespacho=$_POST['bnDespachoSelect'];
 $idclient=$_POST['bnClienteSelect'];
 $cant= $_POST['cnp_cue'];
 $cant_d = $_POST['cnt_cue'];
 $nro_ref = $_POST['nrf_cue'];

 $nombreImg=$_FILES["archivos"]["name"];
 $rutaAlmacenamiento=$_FILES["archivos"]["tmp_name"];
 $carpeta='../../../archivos/';
 $rutafinal=$carpeta.$nombreImg;

 
 if(!file_exists($rutafinal)){
    if(move_uploaded_file($rutaAlmacenamiento, $rutafinal)){
        $datos = array(
            $nro_ref,
            $cant_d,
            $cant,
            $nombreImg,
            $rutafinal,
            $idbank,
            $idbanc,
            $idclient,
            $iddespacho
        );
        
    }
    echo $obj->agregarCuenta($datos);
 }else{
     return 0;
 }

 
?>

