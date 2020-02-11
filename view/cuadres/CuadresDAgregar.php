<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT d.cod_des,d.fec_des,c.cod_cli,c.nom_cli,d.pre_des FROM despacho AS d
       INNER JOIN cliente AS c
       ON d.cod_cli=c.cod_cli
       AND d.est_des='A'";
$result=mysqli_query($conexion,$sql);  
?>

<div class="container p-4">
    <br>
        <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 50%; height: 50%; border-radius:10px;">
            <h2 class="card-title">Despachos</h2>
        </div>
                <div class="mx-auto" style="width: 70%; height: 70%;">
                    <form id="frmDespachoU" method="POST" onsubmit="return false" autocomplete="off">
                        <div class="form-row">
                                <div class="col-12 mt-4">
                                 <select class="form-control " id="DespachoBnSelectU" name="DespachoBnSelectU" >
                                        <option value="A">Seleccione Despacho</option> 
                                        <?php while($ver= mysqli_fetch_row($result)): ?>
                                            <option value="<?php echo $ver[0]?>"><?php echo $ver[1]."-".$ver[3]."-".$ver[4]  ?> </option>
                                        <?php endwhile; ?>
                                 </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="cpo_desU" id="cpo_desU" class="form-control  border-dark" placeholder="Cantidad de Pollo">
                            </div>
                            <div class="col">
                                <input type="text" name="cpa_desU" id="cpa_desU" class="form-control" placeholder="Cantidad de Patas">
                            </div>
                            <div class="col">
                                <input type="text" name="cal_desU" id="cal_desU" class="form-control" placeholder="Cantidad de Alas">
                            </div>
                            <div class="col">
                                <input type="text" name="cmo_desU" id="cmo_desU" class="form-control" placeholder="Cantidad de Mollejas">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="pok_desU" id="pok_desU" class="form-control" placeholder="Kilos de Pollo">
                            </div>
                            <div class="col">
                                <input type="text" name="pak_desU" id="pak_desU" class="form-control" placeholder="Kilos de Pata">
                            </div>
                            <div class="col">
                                <input type="text" name="alk_desU" id="alk_desU" class="form-control" placeholder="Kilos de Ala">
                            </div>
                            <div class="col">
                                <input type="text" name="mok_desU" id="mok_desU" class="form-control" placeholder="Kilos de Mollejas">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-6">
                                <input  class="btn btn-dark btn-block" type="submit" id="btnsDespachoU" name="btnsDespacho" value="+"></input>
                            </div>
                            <div class="col-6">
                                <input  class="btn btn-danger btn-block" type="submit" id="bntrDespachoU" name="btnrDespacho" value="-"></input>
                            </div>
                        </div>
                     </form>  
              </div>
</div>


<script>
    $(document).ready(function () {
       $('#DespachoBnSelectU').select2();
    });
</script>


<script>
        $(document).ready(function () {
           $('#btnsDespachoU').click(function () {
               datos=$('#frmDespachoU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/despachos/SActualizarDespacho.php",
                   success:function(r){
                       alert(r);
                       if (r==1){
                           $('#frmDespachoU')[0].reset();
                           $('#DespachoM').load('view/cuadres/CuadresDAgregar.php');
                           alertify.success("Despacho actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar despacho");
                       }
                   }
               });
           });
        });
</script>

<script>
        $(document).ready(function () {
           $('#bntrDespachoU').click(function () {
               datos=$('#frmDespachoU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/despachos/RActualizarDespacho.php",
                   success:function(r){
                       alert(r);
                       if (r==1){
                           $('#frmDespachoU')[0].reset();
                           $('#DespachoM').load('view/cuadres/CuadresDAgregar.php');
                           alertify.success("Cliente actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar cliente");
                       }
                   }
               });
           });
        });
</script>