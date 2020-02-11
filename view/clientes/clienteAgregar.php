<div class="container p-4">
    <br>
       <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 70%; height: 70%; border-radius:10px;">
          <h2 class="card-title">Registrar Cliente</h2>
        </div>
        <div class="mx-auto" style="width: 70%; height: 70%;">
        <form id="frmClientes" method="POST" onsubmit="return agregarClientes()" autocomplete="off">
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="nom_cli" id="nom_cli" class="form-control  border-dark" placeholder="Nombre del Cliente">
                    </div>
                    <div class="col">
                        <input type="text" name="ape_cli" id="ape_cli" class="form-control" placeholder="Apellido del Cliente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="ced_cli" id="ced_cli" class="form-control" placeholder="Cedula del Cliente">
                    </div>
                    <div class="col">
                        <input type="text" name="rif_cli" id="rif_cli" class="form-control" placeholder="Rif del Cliente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="email" name="cor_cli" id="cor_cli" class="form-control" placeholder="Correo del Cliente">
                    </div>
                    <div class="col">
                        <input type="number" name="tel_cli" id="tel_cli" class="form-control" placeholder="Telefono del Cliente">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="ads_cli" id="ads_cli" class="form-control" placeholder="Direccion del Cliente">
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
   function agregarClientes(){
    datos=$('#frmClientes').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/clientes/AgregarClientes.php",
                    success:function(r){
                                r = r.trim();
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#frmClientes')[0].reset();
                            alertify.success("Cliente agregado con exito");
                        }else{
                            alertify.error("No se pudo agregar Cliente");
                        }
                    }
                });
    return false;            
 }

 
</script>