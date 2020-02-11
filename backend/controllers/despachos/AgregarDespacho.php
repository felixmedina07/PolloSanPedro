<?php
 session_start(); 
require_once "../../class/conexion.php";
require_once "../../class/despacho.php";
$obj= new Despacho();

$c= new Conectar();
$conexion= $c->conexion();

$sql="SELECT cod_pro,
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

$result=mysqli_query($conexion,$sql);
$d=mysqli_fetch_array($result);

$idcliente= $_POST['bnDespachoCSelect'];
$cant_po = $_POST['cpo_des'];
$cant_pa = $_POST['cpa_des'];
$cant_al = $_POST['cal_des'];
$cant_mo = $_POST['cmo_des'];
$kg_po = $_POST['pok_des'];
$kg_pa = $_POST['pak_des'];
$kg_al = $_POST['alk_des'];
$kg_mo = $_POST['mok_des'];
$pre_po = $kg_po * $d[1];
$pre_pa = $kg_pa * $d[2];
$pre_al = $kg_al * $d[3];
$pre_mo = $kg_mo * $d[4];
$idprod = $d[0];
$precio = ($pre_po + $pre_pa + $pre_al + $pre_mo);
$preciod = ($precio / $d[6]);
$e= 'A';

$c_po=$cant_po * $d[5];
$c_pa=$kg_pa;
$c_al=$kg_al;
$c_mo=$kg_mo;
$des_po= $d[7] - $c_po;
$des_pa= $d[8] - $c_pa;
$des_al= $d[9] - $c_al;
$des_mo= $d[10] - $c_mo;

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
   $e,
   $idprod,
   $idcliente,
   $des_po,
   $des_pa,
   $des_al,
   $des_mo
);

echo $obj->agregarDespacho($datos);