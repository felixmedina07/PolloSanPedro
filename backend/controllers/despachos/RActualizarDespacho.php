<?php 
session_start();
require_once "../../class/conexion.php";
require_once "../../class/despacho.php";
$objs= new Despacho();
$c= new Conectar();
$conexion= $c->conexion();
$iddespacho= $_POST['DespachoBnSelectU'];
$sql="SELECT pre_des,
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
             cod_cli  
      FROM despacho
      WHERE cod_des='$iddespacho'
      AND est_des='A'";
$result=mysqli_query($conexion,$sql);
$d=mysqli_fetch_array($result);

$sql2="SELECT cod_pro,
             ppo_pro,
             ppa_pro,
             pal_pro,
             pmo_pro,
             ces_pro,
             tas_pro,
             cpo_pro,
             cpa_pro,
             cal_pro,
             cmo_pro
      FROM productos 
      WHERE est_pro='A'";

$result2=mysqli_query($conexion,$sql2);
$d2=mysqli_fetch_array($result2);

$cant_poU = $_POST['cpo_desU'];
$cant_paU = $_POST['cpa_desU'];
$cant_alU = $_POST['cal_desU'];
$cant_moU = $_POST['cmo_desU'];
$kg_poU = $_POST['pok_desU'];
$kg_paU = $_POST['pak_desU'];
$kg_alU = $_POST['alk_desU'];
$kg_moU = $_POST['mok_desU'];

// precios del formulario de actualizar
$pre_poU = $kg_poU * $d2[1];
$pre_paU = $kg_paU * $d2[2];
$pre_alU = $kg_alU * $d2[3];
$pre_moU = $kg_moU * $d2[4];
$idprod = $d2[0];
$precioU = ($pre_poU + $pre_paU + $pre_alU + $pre_moU);
$preciodU = ($precioU / $d2[6]);

//cantidad de el formulario de actualizar
$c_po=$cant_poU * $d2[5];
$c_pa=$kg_paU;
$c_al=$kg_alU;
$c_mo=$kg_moU;

//descuento de cantidades segun el fomulario de actualizar
$des_por= $d2[7] + $c_po;
$des_par= $d2[8] + $c_pa;
$des_alr= $d2[9] + $c_al;
$des_mor= $d2[10] + $c_mo;

//precio total para actualizar
$precior=  $d[0] - $precioU;
$preciodr= $d[1] - $preciodU;
//cantidad de productos para actualizar
$cant_por= $d[2] - $cant_poU;
$cant_par= $d[3] - $cant_paU;
$cant_alr= $d[4] - $cant_alU;
$cant_mor= $d[5] - $cant_moU;
//kilos de productos para actualizar
$kg_por=$d[6] - $kg_poU;
$kg_par=$d[7] - $kg_paU;
$kg_alr=$d[8] - $kg_alU;
$kg_mor=$d[9] - $kg_moU;
//precio de productos para actualizar 
$pre_por=$d[10] - $pre_poU;
$pre_par=$d[11] - $pre_paU;
$pre_alr=$d[12] - $pre_alU;
$pre_mor=$d[13] - $pre_moU;
//id foraneos
$idcliente=$d[14];

$datos=array(
    $precior,
    $preciodr,
    $cant_por,
    $cant_par,
    $cant_alr,
    $cant_mor,
    $kg_por,
    $kg_par,
    $kg_alr,
    $kg_mor,
    $pre_por,
    $pre_par,
    $pre_alr,
    $pre_mor,
    $idprod,
    $idcliente,
    $iddespacho,
    $des_por,
    $des_par,
    $des_alr,
    $des_mor
);


echo $objs->actualizarRDespacho($datos);
?>