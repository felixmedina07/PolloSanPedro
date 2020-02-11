<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion = $obj->conexion();
$sql ="SELECT   cod_cli,
                nom_cli,
                ape_cli,
                ced_cli 
        FROM cliente
        WHERE est_cli='A'";
    $result=mysqli_query($conexion,$sql);

$sql2="SELECT d.cod_des,fec_des,c.cod_cli,c.nom_cli FROM despacho AS d
       INNER JOIN cliente AS c
       ON d.cod_cli=c.cod_cli
       AND d.est_des='A'";
$result2=mysqli_query($conexion,$sql2);      
?>

<div class="container p-4">
    <br>
       <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 70%; height: 70%; border-radius:10px;">
          <h2 class="card-title">Registrar Cliente</h2>
        </div>
        <div class="mx-auto" style="width: 70%; height: 70%;">
        <form id="frmCuadres" method="POST" onsubmit="return agregarCuadres()" autocomplete="off">
                <div class="form-row">
                    <div class="col mt-3">
                        <select class="form-control " id="ClienteBnSelect" name="ClienteBnSelect" >
                                    <option value="A">Seleccione Cliente</option> 
                                    <?php while($ver= mysqli_fetch_row($result)): ?>
                                        <option value="<?php echo $ver[0]?>"><?php echo $ver[1]."-".$ver[2]."-".$ver[3]; ?></option>
                                    <?php endwhile; ?>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                   <div class="col mt-2 mb-2">
                   <select class="form-control " id="DespachoBnSelect" name="DespachoBnSelect" >
                                <option value="A">Seleccione Despacho</option> 
                                <?php while($ver2= mysqli_fetch_row($result2)): ?>
                                    <option value="<?php echo $ver2[0]?>"><?php echo $ver2[1]."-".$ver2[3] ?> </option>
                                <?php endwhile; ?>
                    </select>
                   </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="cpo_cua" id="cpo_cua" class="form-control" placeholder="Cantidad Pollos">
                    </div>
                    <div class="col">
                        <input type="text" name="cpa_cua" id="cpa_cua" class="form-control" placeholder="Cantidad Patas">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="cal_cua" id="cal_cua" class="form-control" placeholder="Cantidad Alas">
                    </div>
                    <div class="col">
                        <input type="text" name="cmo_cua" id="cmo_cua" class="form-control" placeholder="Cantidad Mollejas">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="pre_cua" id="pre_cua" class="form-control" placeholder="Precio">
                    </div>
                </div>
                <div class="form-row mt-3">
                <div class="col">
                <input  class="btn btn-dark btn-block" type="submit" value="Save"></input>
                </div>
                </div>
         </form>
        </div>
</div>

<script>
   function agregarCuadres(){
    datos=$('#frmCuadres').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/cuadres/AgregarCuadres.php",
                    success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#frmCuadres')[0].reset();
                            alertify.success("Cuadre agregado con exito");
                        }else{
                            alertify.error("No se pudo agregar Cuadre");
                        }
                    }
                });
    return false;            
 }
</script>

<script>
$('#DespachoBnSelect').change(function () {
            $.ajax({
                type:"POST",
                data:"iddespacho=" + $('#DespachoBnSelect').val(),
                url:"backend/controllers/cuadres/llenarFormCuadres.php",
                success:function(r){
                  dato=jQuery.parseJSON(r);
                  $('#cpo_cua').val(dato['cpo_des']);
                  $('#cpa_cua').val(dato['cpa_des']);
                  $('#cal_cua').val(dato['cal_des']);
                  $('#cmo_cua').val(dato['cmo_des']);
                  $('#pre_cua').val(dato['pre_des']);
                }
            });
        });
</script>

<script>
    $(document).ready(function () {
      $('#DespachoBnSelect').select2();
      $('#ClienteBnSelect').select2();
    });
</script>