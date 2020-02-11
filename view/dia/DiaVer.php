<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$sql="SELECT d.cod_dia,d.fec_dia,u.nom_usu,u.las_usu 
      FROM dia AS d
      INNER JOIN usuarios AS u
      ON d.cod_usu=u.cod_usu
      AND est_dia='A'";
$result=mysqli_query($conexion,$sql);      
?>



<div class="container p-4">
<table class="table table-hover table-bordered text-center" id="tablaDiaDataTable">
<thead  style="background-color: #dc3545; color: white; font-weight: bold">
    <tr>
        <td>Fecha</td>
        <td>Nombre</td>
        <td>Ultimo Logeo</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>    
</thead>
  <?php while($ver = mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td>
           <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalDiaUpdate" onclick="agregaDatosDia('<?php echo $ver[0]; ?>')">
             <i class="fas fa-pencil-alt"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[0]; ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
    <?php endwhile; ?> 
</table>
</div>

<!-- MODAL PARA OBTENER Y ACTUALIZAR CLIENTE -->
 <!-- Modal -->
 <div class="modal fade" id="abremodalDiaUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmdiaU">
                        <input type="text" name="iddia" hidden="" id="iddia">
                        <label for="fec_diaU">Dia</label>
                        <input type="text" name="fec_diaU" id="fec_diaU" class="form-control" required="" readonly>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarDiaU" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

<script>

function agregaDatosDia(iddia){
            $.ajax({
                type: "POST",
                data: "iddia=" + iddia,
                url: "backend/controllers/dia/ObtenerDia.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#iddia').val(datos['cod_dia']);
                    $('#fec_diaU').val(datos['fec_dia']);
                }
            });
        }

function papelera(iddia) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddia=" + iddia ,
                        url:"backend/controllers/dia/Papelera.php",
                        success:function(r){
                            alert(r);
                             if (r==1){
                                $('#diaVer').load("view/dia/DiaVer.php");   
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
           $('#btnAgregarDiaU').click(function () {
               datos=$('#frmdiaU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/dia/ActualizarDia.php",
                   success:function(r){
                       alert(r);
                       if (r==1){
                           $('#frmdiaU')[0].reset();
                           $('#diaVer').load("view/dia/DiaVer.php");   
                           alertify.success("Dia actualizado con exito");
                       }else{
                           alertify.error("No se pudo Actualizar Dia");
                       }
                   }
               });
           });
        });


        $(document).ready(function() {
        $('#tablaDiaDataTable').DataTable();
    } );
    </script>


     <script>
         $(function() {
             var fechaA = new Date();
             var yyyy = fechaA.getFullYear();

             $("#fec_diaU").datepicker({
                 changeMonth: true,
                 changeYear: true,
                 yearRange: '1900:' + yyyy,
                 dateFormat: "yy-dd-mm"
             });

         });
     
     </script>
