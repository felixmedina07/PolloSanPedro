<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT c.nrf_cue,
             c.cnt_cue,
             c.cnp_cue,
             c.rtf_cue, 
             cl.nom_cli,
             bc.nom_bnc,
             bc.rcd_bnc,
             bk.nom_bnk,
             d.fec_des,
             c.cod_cue
      FROM cuentas AS c
      INNER JOIN bancos_cliente AS bk
      ON c.cod_bnk=bk.cod_bnk
      INNER JOIN bancos_casa AS bc
      ON c.cod_bnc=bc.cod_bnc
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli 
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      AND est_cue='A'";
$result=mysqli_query($conexion,$sql);
?>


<div class="container p-4">
    
    <div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
            <h2 class="card-title"> Tabla Cuentas</h2>
    </div>

        <table class="table table-hover table-bordered text-center" id="tablaCuDataTablePDF">
          <thead>
          <tr>
                <td>F</td>
                <td>F</td>
                <td>F</td>
                <td>F</td>
                <td>F</td>
                <td>F</td>
                <td>F</td>
                <td>F</td>
                <td></td>
                <td>PDF</td>
            </tr> 
          </thead>
    <?php while($ver=mysqli_fetch_row($result)): ?>
      <tr>
            <td><?php echo $ver[0]; ?></td>
            <td><?php echo $ver[1] ;?></td>
            <td><?php echo $ver[2] ;?></td>
              <td>
                    <?php
                    $imgVer=explode("/",$ver[3]);
                    $imgruta = $imgVer[3]."/".$imgVer[4];
                    
                    ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fotomodalP">
                        ver
                    </button>
             </td> 
            <td><?php echo $ver[4]; ?></td>
            <td><?php echo $ver[5]; ?></td>
            <td><?php echo $ver[6]; ?></td>
            <td><?php echo $ver[7]; ?></td>
            <td><?php echo $ver[8]; ?></td>
            <td>
                    <a href="backend/controllers/cuentas/ReporteCuentaPdf.php?idcuenta=<?php echo $ver[0]?>" class="btn btn-danger btn-sm">
                    <span><i class="fas fa-clipboard-check"></i></span>
            </td>
        </tr>
   <?php endwhile; ?>

</table>
</div>

<!-- Modal de foto -->
<div class="modal fade" id="fotomodalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto de la Transferencia</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo $imgruta ?>" alt="" width="50%" height="50%">
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaCuDataTablePDF').DataTable();
    } );
</script>