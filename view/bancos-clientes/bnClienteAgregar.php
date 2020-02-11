<?php
require_once "../../backend/class/conexion.php";
$obj = new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cod_cli,nom_cli FROM cliente WHERE est_cli='A'";
$result =mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <br>
       <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 70%; height: 70%; border-radius:10px;">
          <h2 class="card-title">Registrar Banco Cliente</h2>
        </div>
        <div class="mx-auto" style="width: 60%; height: 60%;">
        <form id="formBancoCliente" method="POST" onsubmit="return agregarBancoC()" autocomplete="off">
                <div class="form-row">
                <div class="col mt-4">
                    <select class="form-control " id="bnClienteSelect" name="bnClienteSelect" >
                        <option value="A">Seleccione un Cliente</option> 
                        <?php while($ver= mysqli_fetch_row($result)): ?>
                            <option value="<?php echo $ver[0]?>"><?php echo $ver[1] ?> </option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="not_bnk" id="not_bnk" class="form-control  border-dark" placeholder="Nombre Titular">
                    </div>
                    <div class="col">
                        <input type="text" name="ncu_bnk" id="ncu_bnk" class="form-control" placeholder="Numero de cuenta ">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="tpc_bnk" id="tpc_bnk" class="form-control" placeholder="Tipo de Cuenta">
                    </div>
                    <div class="col">
                        <input type="text" name="rcd_bnk" id="rcd_bnk" class="form-control" placeholder="Rif o cedula del titular">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nom_bnk" id="nom_bnk" class="form-control" placeholder="Nombre del Banco">
                    </div>
                    <div class="col">
                        <input type="email" name="cor_bnk" id="cor_bnk" class="form-control" placeholder="Correo del banco ">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="tti_bnk" id="tti_bnk" class="form-control" placeholder="Telefono del titular de la cuenta">
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
function agregarBancoC(){
    datos=$('#formBancoCliente').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/bnClientes/AgregarBnCliente.php",
                    success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#formBancoCliente')[0].reset();
                            alertify.success("Banco agregado con exito");
                        }else{
                            alertify.error("No se pudo agregar Banco");
                        }
                    }
                });
    return false; 
}
</script>


<script>
    $(document).ready(function () {
       $('#bnClienteSelect').select2();
    });
</script>