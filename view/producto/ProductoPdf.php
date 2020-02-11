<div class="container p-4">
    
<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title">Vista Productos</h2>
</div>

<?php 
   require_once "../../backend/class/conexion.php";
   $obj=new conectar();
   $conexion=$obj->conexion(); 
   $sql ="SELECT cod_pro,tas_pro,tpo_pro,tpa_pro,tmo_pro,tal_pro,ppo_pro,ppa_pro,pal_pro,pmo_pro,csp_pro,ces_pro,prp_pro,cpo_pro,cpa_pro,cal_pro,cmo_pro FROM productos WHERE est_pro='A'";
   $result = mysqli_query($conexion,$sql);
?>

<table class="table table-responsive table-hover table-bordered text-center">
    <tr>
        <td>Tasa General</td>
        <td>Tasa Pollo</td>
        <td>Tasa Patas</td>
        <td>Tasa Molleja</td>
        <td>Tasa Alas</td>
        <td>Precio Pollos</td>
        <td>Precio Patas</td>
        <td>Precio Alas</td>
        <td>Pollo Molleja</td>
        <td>Kilos Cestas Pollo</td>
        <td>Cestas Pollo</td>
        <td>Promedio Pollo</td>
        <td>Cantidad Pollo</td>
        <td>Cantidad Patas</td>
        <td>Cantidad Alas</td>
        <td>Cantidad Molleja</td>
        <td>PDF</td>
    </tr>

    <?php while ($ver = mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        <td><?php echo $ver[8]; ?></td>
        <td><?php echo $ver[9]; ?></td>
        <td><?php echo $ver[10]; ?></td>
        <td><?php echo $ver[11]; ?></td>
        <td><?php echo $ver[12]; ?></td>
        <td><?php echo $ver[13]; ?></td>
        <td><?php echo $ver[14]; ?></td>
        <td><?php echo $ver[15]; ?></td>
        <td><?php echo $ver[16]; ?></td>
        <td>
            <a href="backend/controllers/productos/ReporteProductoPdf.php?idproducto=<?php echo $ver[0]?>" class="btn btn-danger btn-sm">
            <span><i class="fas fa-clipboard-check"></i></span>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</div>
