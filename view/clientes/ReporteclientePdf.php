<?php
require_once "../../backend/class/conexion.php";
require_once "../../backend/class/clientes.php";
$clien= new Cliente();
$obj= new Conectar();
$conexion= $obj->conexion();
$idcliente= $_GET['idcliente'];
$sql="SELECT cod_cli,nom_cli,ape_cli,ced_cli,rif_cli,ads_cli,cor_cli,tel_cli FROM cliente WHERE cod_cli='$idcliente'";
$result=mysqli_query($conexion,$sql);
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"> <link rel="stylesheet" href="../../../librerias/bootstrap-4.4/bootstrap.min.css"><title>Document</title></head><body><table class="table table-bordered table-dark"><tr><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Rif</th><th>Direccion</th></tr><tbody>
                <?php while( $ver= mysqli_fetch_row($result)): ?><tr><th><?php echo $ver[1]; ?></th><td><?php echo $ver[2]; ?></td><td><?php echo $ver[3]; ?></td><td><?php echo $ver[4]; ?></td><td><?php echo $ver[5]; ?></td></tr><?php endwhile; ?></tbody></table></body></html>