<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT c.cnp_cue,
             cl.nom_cli,
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
      AND c.est_cue='A'";
$result=mysqli_query($conexion,$sql);

$sql4="SELECT d.cod_des,fec_des,c.cod_cli,c.nom_cli FROM despacho AS d
                                                          INNER JOIN cliente AS c
                                                          ON d.cod_cli=c.cod_cli
                                                          AND d.est_des='A'";
$result4=mysqli_query($conexion,$sql4);                                                          
?>


<div class="container p-4">
    <br>
       <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 70%; height: 70%; border-radius:10px;">
          <h2 class="card-title">Actualizar Cuenta</h2>
        </div>
        <div class="mx-auto" style="width: 70%; height: 70%;">
        <form id="frmCuentasU" method="POST" onsubmit="return actualizarCuentaU()" autocomplete="off" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-6 mt-4">
                        <select class="form-control " id="bnCuentaSelectU" name="bnCuentaSelectU" >
                            <option value="A">Seleccione una Cuenta</option> 
                            <?php while($ver= mysqli_fetch_row($result)): ?>
                                <option value="<?php echo $ver[3]?>"><?php echo $ver[1]." "."-"." ".$ver[0]." "."-"." ".$ver[2] ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="col-6 mt-4">
                        <select class="form-control " id="bnDespachoSelectU" name="bnDespachoSelectU" >
                            <option value="A">Seleccione Despacho</option> 
                            <?php while($ver4= mysqli_fetch_row($result4)): ?>
                                <option value="<?php echo $ver4[0]?>"><?php echo $ver4[1]."-".$ver4[3] ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="cnp_cueU" id="cnp_cueU" class="form-control  border-dark" placeholder="Precio De La Transferencia">
                    </div>
                    <div class="col">
                        <input type="text" name="cnt_cueU" id="cnt_cueU" class="form-control" placeholder="Cantidad de la Cuenta" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nrf_cueU" id="nrf_cueU" class="form-control" placeholder="Numero de Referencia">
                    </div>
                </div>
                    <input type="file" name="archivosU" id="archivosU" class="form-control-file" accept="image/jpeg,image/gif,image/png" >         
                <div class="form-row mt-3">
                    <div class="col">
                    <input  class="btn btn-dark btn-block" type="submit" value="Save"></input>
                    </div>
                </div>
         </form>
        </div>
</div>


<script>
$('#bnDespachoSelectU').change(function () {
            $.ajax({
                type:"POST",
                data:"iddespacho=" + $('#bnDespachoSelectU').val(),
                url:"backend/controllers/cuentas/llenarFormCuenta.php",
                success:function(r){
                  dato=jQuery.parseJSON(r);
                  $('#cnt_cueU').val(dato['pre_des']);
                 }
            });
        });
</script>

<script>
function actualizarCuentaU(){
    var formData = new FormData(document.getElementById("frmCuentasU"));
                $.ajax({
                    data:formData,
                    url:"backend/controllers/cuentas/ActualizarCuenta.php",
                    type:"POST",
                    contentType: false,
                    processData: false,
                    success:function(r){
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#frmCuentasU')[0].reset();
                            alertify.success("Cuentas Actualizada con exito");
                        }else{
                            alertify.error("No se pudo Actualizar Cuenta");
                        }
                    }
                });
    return false; 
}

</script>


<script>
    $(document).ready(function () {
     
       $('#bnCuentaSelectU').select2();
       $('#bnDespachoSelectU').select2();
    });
</script>