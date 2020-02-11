<?php
require_once "../../class/conexion.php";
require_once "../../class/productos.php";
$obj = new Producto();
$id_prod = $_POST['idproducto'];
$tasa= $_POST['tas_proU'];
  $tasa_po = $_POST['tpo_proU'];
  $tasa_pa = $_POST['tpa_proU'];
  $tasa_mo =$_POST['tmo_proU'];
  $tasa_al = $_POST['tal_proU'];
  $pre_po = $tasa_po * $tasa;
  $pre_pa = $tasa_pa * $tasa;
  $pre_al = $tasa_al * $tasa;
  $pre_mo = $tasa_mo * $tasa;
  $cestas = $_POST['ces_proU'];
  $cestas_p = $_POST['csp_proU'];
  $prom_po = $_POST['prp_proU'];
  $cant_po = $_POST['cpo_proU'];
  $porcentaje = $prom_po * 0.05;
  $cant_pa = ($cant_po * 2) * 0.05;
  $cant_al= ($cant_po * 2) * 0.05;
  $cant_mo	= ($cant_po * 1) * 0.05;


  $datos=array(
    $id_prod,  
    $tasa,
    $tasa_po,
    $tasa_pa,
    $tasa_mo,
    $tasa_al,
    $pre_po,
    $pre_pa,
    $pre_al,
    $pre_mo,
    $cestas_p,
    $cestas,
    $prom_po,
    $cant_po,
    $cant_pa,
    $cant_al,
    $cant_mo
  );

  echo $obj->ActualizarProducto($datos);
?>