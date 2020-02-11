<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cod_cli,nom_cli FROM cliente WHERE est_cli='A'";
$result =mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <br>
        <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 50%; height: 50%; border-radius:10px;">
            <h2 class="card-title">Despachos</h2>
        </div>
                <div class="mx-auto" style="width: 70%; height: 70%;">
                    <form id="frmDespacho" method="POST" onsubmit="return agregarDespacho()" autocomplete="off">
                        <div class="form-row">
                                <div class="col-12 mt-4">
                                    <select class="form-control " id="bnDespachoCSelect" name="bnDespachoCSelect" >
                                        <option value="A">Seleccione un Cliente</option> 
                                        <?php while($ver= mysqli_fetch_row($result)): ?>
                                            <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ?> </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="cpo_des" id="cpo_des" class="form-control  border-dark" placeholder="Cantidad de Pollo">
                            </div>
                            <div class="col">
                                <input type="text" name="cpa_des" id="cpa_des" class="form-control" placeholder="Cantidad de Patas">
                            </div>
                            <div class="col">
                                <input type="text" name="cal_des" id="cal_des" class="form-control" placeholder="Cantidad de Alas">
                            </div>
                            <div class="col">
                                <input type="text" name="cmo_des" id="cmo_des" class="form-control" placeholder="Cantidad de Mollejas">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="pok_des" id="pok_des" class="form-control" placeholder="Kilos de Pollo">
                            </div>
                            <div class="col">
                                <input type="text" name="pak_des" id="pak_des" class="form-control" placeholder="Kilos de Pata">
                            </div>
                            <div class="col">
                                <input type="text" name="alk_des" id="alk_des" class="form-control" placeholder="Kilos de Ala">
                            </div>
                            <div class="col">
                                <input type="text" name="mok_des" id="mok_des" class="form-control" placeholder="Kilos de Mollejas">
                            </div>
                        </div>
                        <div class="form-row mt-3">
                            <div class="col-6">
                                <input  class="btn btn-dark btn-block" type="submit" id="btns" value="Save"></input>
                            </div>
                            <div class="col-6">
                                <input  class="btn btn-danger btn-block" type="submit" id="bntp" value="Save"></input>
                            </div>
                        </div>
                     </form>  
              </div>
</div>

<script>  
$(document).ready(function(){
    $('#bntp').hide();
    
    $('#btns').click(function(){
        $('#bntp').show();
    })

});
 
</script>

<script>
    $(document).ready(function () {
       $('#bnDespachoCSelect').select2();
    });
</script>

<script>
function agregarDespacho(){
    datos=$('#frmDespacho').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/despachos/AgregarDespacho.php",
                    success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#frmDespacho')[0].reset();
                            alertify.success("Despacho agregado con exito");
                        }else{
                            alertify.error("No se pudo agregar Despacho");
                        }
                    }
                });
    return false; 
}

</script>
