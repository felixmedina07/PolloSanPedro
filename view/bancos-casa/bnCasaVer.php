<div class="container p-4">
    
<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title"> Bancos Pollos San Pedro</h2>
</div>

<?php
session_start();
 require_once "../../backend/class/conexion.php";
 $obj = new Conectar();
 $conexion = $obj->conexion();
 $sql="SELECT cod_bnc,
              nuc_bnc,
              rcd_bnc,
              nom_bnc,
              cor_bnc 
       FROM   bancos_casa 
       WHERE  est_bnc='A'";
   $result = mysqli_query($conexion,$sql);   
?>

<table class="table table-hover table-bordered text-center" id="tablaBncDataTable">
   <thead>
   <tr>
        <td>Nombre del Banco</td>
        <td>Numero De Cuenta</td>
        <td>Rif del Banco</td>
        <td>Correo Del Banco</td>
        <td>Editar</td> 
        <td>Eliminar</td>
    </tr>
   </thead>
  <?php while($ver=mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[3]  ?> </td>
        <td><?php echo $ver[1]  ?> </td>
        <td><?php echo $ver[2]  ?> </td>
        <td><?php echo $ver[4]  ?> </td>
        <td>
           <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#BancoUpdate" onclick="agregaDatosbnCasa('<?php echo $ver[0]; ?>')">
             <i class="fas fa-pencil-alt"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[0];?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
       <?php endwhile; ?>
</table>
</div>



<!-- MODAL MOSTRAR Y EDITAR -->
<!-- Modal -->
<div class="modal fade" id="BancoUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Bancos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmbnCasaU">
                        <input type="text" name="idbanc" hidden="" id="idbanc">
                        <label for="nom_bncU">Nombre del Banco</label>
                        <input type="text" name="nom_bncU" id="nom_bncU" class="form-control">
                        <label for="nuc_bncU">Numero De Cuenta</label>
                        <input type="text" name="nuc_bncU" id="nuc_bncU" class="form-control">
                        <label for="rcd_bncU">Rif del Banco</label>
                        <input type="text" name="rcd_bncU" id="rcd_bncU" class="form-control">
                        <label for="cor_bncU">Correo Del Banco</label>
                        <input type="text" name="cor_bncU" id="cor_bncU" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarbnCasaU" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


<script>
  function agregaDatosbnCasa(idbanc){
    $.ajax({
                type: "POST",
                data: "idbanc=" + idbanc,
                url: "backend/controllers/bnCasa/ObtenerbnCasa.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idbanc').val(datos['cod_bnc']);
                    $('#nom_bncU').val(datos['nom_bnc']);
                    $('#nuc_bncU').val(datos['nuc_bnc']);
                    $('#rcd_bncU').val(datos['rcd_bnc']);
                    $('#cor_bncU').val(datos['cor_bnc']);
                }
            });
  }
</script>


<script>
 function papelera(idbanc) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbanc=" + idbanc ,
                        url:"backend/controllers/bnCasa/Papelera.php",
                        success:function(r){
                            if (r==1){
                                $('#bnCasaVer').load('view/bancos-casa/bnCasaVer.php');
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
           $('#btnAgregarbnCasaU').click(function () {
               datos=$('#frmbnCasaU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/bnCasa/ActualizarbnCasa.php",
                   success:function(r){
                       alert(r);
                       if (r==1){
                           $('#frmbnCasaU')[0].reset();
                           $('#bnCasaVer').load('view/bancos-casa/bnCasaVer.php');
                           alertify.success("Banco actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar Banco");
                       }
                   }
               });
           });
        });

        $(document).ready(function() {
        $('#tablaBncDataTable').DataTable();
    } ); 
    </script>