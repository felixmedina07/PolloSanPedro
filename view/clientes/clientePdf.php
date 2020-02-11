<div class="container p-4">

<?php
session_start();
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT cod_cli,
                nom_cli,
                ape_cli,
                ced_cli,
                rif_cli,
                ads_cli,
                cor_cli,
                tel_cli 
        FROM cliente
        WHERE est_cli='A'";
    $result=mysqli_query($conexion,$sql);            
?>

<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title">Vista Cliente</h2>
</div>

<table class="table table-hover table-bordered text-center" id="tablaClienteDataTablePDF">
<thead  style="background-color: #dc3545; color: white; font-weight: bold">
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Cedula</td>
        <td>Rif</td>
        <td>Direccion</td>
        <td>Correo</td>
        <td>Telefono</td>
        <td>PDF</td>
    </tr>    
</thead>
  <?php while($ver = mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        <td>
            <a href="backend/controllers/clientes/ReporteClientePdf.php?idcliente=<?php echo $ver[0]?>" class="btn btn-danger btn-sm">
            <span><i class="fas fa-clipboard-check"></i></span>
        </td>
    </tr>
    <?php endwhile; ?> 
</table>
</div>

<script>
        $(document).ready(function() {
        $('#tablaClienteDataTablePDF').DataTable();
    } );
    </script>