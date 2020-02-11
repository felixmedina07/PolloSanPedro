<div class="container p-4">
    <br>
       <div class="card mx-auto text-white text-center bg-dark pt-2" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title">Tabla Productos</h2>
        </div>
        <div class="mx-auto" style="width: 80%; height: 80%;">
        <form id="frmProductos" method="POST" onsubmit="return agregarProductos()" autocomplete="off">
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="tas_pro" id="tas_pro" class="form-control  border-dark" placeholder="Precio en bolivares">
                    </div>
                    <div class="col">
                        <input type="text" name="tpo_pro" id="tpo_pro" class="form-control" placeholder="Tasa en dolares del pollo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="tpa_pro" id="tpa_pro" class="form-control" placeholder="Tasa en dolares de Patas">
                    </div>
                    <div class="col">
                        <input type="text" name="tmo_pro" id="tmo_pro" class="form-control" placeholder="Tasa en dolares de mollejas">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="tal_pro" id="tal_pro"  class="form-control" placeholder="Tasa en dolares de Alas">
                    </div>
                    <div class="col">
                        <input type="text" name="ces_pro" id="ces_pro" class="form-control" placeholder="cantidad de pollo por cesta">
                    </div>
                    <div class="col">
                        <input type="text" name="csp_pro" id="csp_pro"  class="form-control" placeholder="Kilos de Pollos">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="text" name="prp_pro" id="prp_pro"  class="form-control" placeholder="Promedio del Pollo">
                    </div>
                    <div class="col">
                        <input type="text" name="cpo_pro" id="cpo_pro"  class="form-control" placeholder="Cantidad del Pollo Total">
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
   function agregarProductos(){
    datos=$('#frmProductos').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"backend/controllers/productos/AgregarProductos.php",
                    success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                        if (r==1){
                            $('#frmProductos')[0].reset();
                            alertify.success("Producto agregado con exito");
                        }else{
                            alertify.error("No se pudo agregar Producto");
                        }
                    }
                });
    return false;            
 }

 
</script>