<?php
session_start();
require_once "../../class/conexion.php";
require_once "../../class/cuadres.php";
$obj = new Cuadre();

$c= new Conectar();
$conexion= $c->conexion();

$sql="SELECT cod_pro,
             ces_pro,
             cpo_pro,
             cpa_pro,
             cal_pro,
             cmo_pro
      FROM productos 
      WHERE est_pro='A'";

$result=mysqli_query($conexion,$sql);
$d=mysqli_fetch_array($result);

$idcliente=$_POST['ClienteBnSelect'];
$iddespacho=$_POST['DespachoBnSelect'];
$idproducto=$d[0];
$cant_po_cuad=$_POST['cpo_cua'];
$cant_pa_cuad=$_POST['cpa_cua'];
$cant_al_cuad=$_POST['cal_cua'];
$cant_mo_cuad=$_POST['cmo_cua'];
$precio_desp=$_POST['pre_cua'];
$c_po=$cant_po_cuad * $d[1];
$c_pa=$cant_pa_cuad;
$c_al=$cant_al_cuad;
$c_mo=$cant_mo_cuad;
$aum_po=$d[2] + $c_po;
$aum_pa=$d[3] + $c_pa;
$aum_al=$d[4] + $c_al;
$aun_mo=$d[5] + $c_mo;

$datos=array(
    $cant_po_cuad,
    $cant_pa_cuad,
    $cant_al_cuad,
    $cant_mo_cuad,
    $precio_desp,
    $idcliente,
    $iddespacho,
    $idproducto,
    $aum_po,
    $aum_pa,
    $aum_al,
    $aun_mo
);

echo $obj->agregaCuadres($datos);
?>