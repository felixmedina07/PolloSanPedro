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
        <td>Editar</td>
        <td>Eliminar</td>
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
           <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalProductoUpdate" onclick="agregaDatosProducto(<?php echo $ver[0]; ?>)">
             <i class="fas fa-pencil-alt"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-danger btn-sm" onclick="papelera(<?php echo $ver[0]; ?>)">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</div>

<!-- MODAL DE OBTENER Y ACTUALIZAR PRODUCTO -->

<div class="modal fade" id="abremodalProductoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmProductoU">
                        <input type="text" name="idproducto" hidden="" id="idproducto">
                        <label for="tas_proU">Tasa General</label>
                        <input type="text" name="tas_proU" id="tas_proU" class="form-control">
                        <label for="tpo_proU">Tasa Pollo</label>
                        <input type="text" name="tpo_proU" id="tpo_proU" class="form-control">
                        <label for="tpa_proU">Tasa Pata</label>
                        <input type="text" name="tpa_proU" id="tpa_proU" class="form-control">
                        <label for="tmo_proU">Tasa Molleja</label>
                        <input type="text" name="tmo_proU" id="tmo_proU" class="form-control">
                        <label for="tal_proU">Tasa Alas</label>
                        <input type="text" name="tal_proU" id="tal_proU" class="form-control">
                        <label for="csp_proU">Kilos Cestas</label>
                        <input type="text" name="csp_proU" id="csp_proU" class="form-control">
                        <label for="ces_proU">Cestas</label>
                        <input type="text" name="ces_proU" id="ces_proU" class="form-control">
                        <label for="prp_proU">Promedio Pollo</label>
                        <input type="text" name="prp_proU" id="prp_proU" class="form-control">
                        <label for="cpo_proU">Cantidad Pollo</label>
                        <input type="text" name="cpo_proU" id="cpo_proU" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarProductoU" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


<script>
 function agregaDatosProducto(idproducto){
            $.ajax({
                type: "POST",
                data: "idproducto=" + idproducto,
                url: "backend/controllers/productos/ObtenerProductos",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idproducto').val(datos['cod_pro']);
                    $('#tas_proU').val(datos['tas_pro']);
                    $('#tpo_proU').val(datos['tpo_pro']);
                    $('#tpa_proU').val(datos['tpa_pro']);
                    $('#tmo_proU').val(datos['tmo_pro']);
                    $('#tal_proU').val(datos['tal_pro']);
                    $('#csp_proU').val(datos['csp_pro']);
                    $('#ces_proU').val(datos['ces_pro']);
                    $('#prp_proU').val(datos['prp_pro']);
                    $('#cpo_proU').val(datos['cpo_pro']);
                }
            });
        }

        function papelera(idproducto) {
            alertify.confirm('¿Desea eliminar esta Producto ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idproducto=" + idproducto ,
                        url:"backend/controllers/productos/Papelera.php",
                        success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                            
                            if (r==1){
                                $('#productoVer').load('view/producto/productoVer.php');
                                alertify.success('Elimando Con Exito');
                            }else{
                                alertify.error('No Se Pudo Eliminar');
                            }
                        }
                    });
                },function(){
                    alertify.error('Cancelo operacion')
                });
        }    
</script>


<script>
        $(document).ready(function () {
           $('#btnAgregarProductoU').click(function () {
               datos=$('#frmProductoU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/productos/ActualizarProductos.php",
                   success:function(r){
                            r = r.trim();
                            console.log(r);
                            alert(r);
                       if (r==1){
                        $('#productoVer').load('view/producto/productoVer.php');
                           alertify.success("Producto actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar Producto");
                       }
                   }
               });
           });
        });
    </script>