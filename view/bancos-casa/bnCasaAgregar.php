<div class="container p-4">
    <br>
       <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 50%; height: 50%; border-radius:10px;">
          <h2 class="card-title">Registrar Banco Pollos San Pedro</h2>
        </div>
        <div class="mx-auto" style="width: 50%; height: 50%;">
        <form id="frmBancoCasa" method="POST" onsubmit="return agregarBanco()" autocomplete="off">
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nuc_bnc" id="nuc_bnc" class="form-control  border-dark" placeholder="Numero de Cuenta">
                    </div>
                    <div class="col">
                        <input type="text" name="rcd_bnc" id="rcd_bnc" class="form-control" placeholder="Rif o Cedula de la Cuenta">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nom_bnc" id="nom_bnc" class="form-control" placeholder="Nombre del Banco">
                    </div>
                    <div class="col">
                        <input type="email" name="cor_bnc" id="cor_bnc" class="form-control" placeholder="Email del Banco">
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
function agregarBanco(){
    datos=$('#frmBancoCasa').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/bnCasa/AgregarbnCasa.php",
                    success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#frmBancoCasa')[0].reset();
                            alertify.success("Banco agregado con exito");
                        }else{
                            alertify.error("No se pudo agregar Banco");
                        }
                    }
                });
    return false; 
}
</script>