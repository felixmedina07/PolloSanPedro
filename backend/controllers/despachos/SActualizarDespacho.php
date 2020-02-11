<?php 
session_start();
require_once "../../class/conexion.php";
require_once "../../class/despacho.php";
$obj= new Despacho();
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
$des_po= $d2[7] - $c_po;
$des_pa= $d2[8] - $c_pa;
$des_al= $d2[9] - $c_al;
$des_mo= $d2[10] - $c_mo;

//precio total para actualizar
$precio=  $d[0] + $precioU;
$preciod= $d[1] + $preciodU;
//cantidad de productos para actualizar
$cant_po= $d[2] + $cant_poU;
$cant_pa= $d[3] + $cant_paU;
$cant_al= $d[4] + $cant_alU;
$cant_mo= $d[5] + $cant_moU;
//kilos de productos para actualizar
$kg_po=$d[6] + $kg_poU;
$kg_pa=$d[7] + $kg_paU;
$kg_al=$d[8] + $kg_alU;
$kg_mo=$d[9] + $kg_moU;
//precio de productos para actualizar 
$pre_po=$d[10] + $pre_poU;
$pre_pa=$d[11] + $pre_paU;
$pre_al=$d[12] + $pre_alU;
$pre_mo=$d[13] + $pre_moU;
//id foraneos
$idcliente=$d[14];

$datos=array(
    $precio,
    $preciod,
    $cant_po,
    $cant_pa,
    $cant_al,
    $cant_mo,
    $kg_po,
    $kg_pa,
    $kg_al,
    $kg_mo,
    $pre_po,
    $pre_pa,
    $pre_al,
    $pre_mo,
    $idprod,
    $idcliente,
    $iddespacho,
    $des_po,
    $des_pa,
    $des_al,
    $des_mo
);

echo $obj->actualizarSDespacho($datos);
?>