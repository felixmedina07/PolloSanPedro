<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$sql="SELECT d.cod_dia,d.fec_dia,u.nom_usu,u.las_usu 
      FROM dia AS d
      INNER JOIN usuarios AS u
      ON d.cod_usu=u.cod_usu
      AND est_dia='B'";
$result=mysqli_query($conexion,$sql);      
?>


<div class="container p-4">

<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title"> Papelera Dia</h2>
</div>

<table class="table table-hover table-bordered text-center" id="tablaDiaDataTableD">
<thead  style="background-color: #dc3545; color: white; font-weight: bold">
    <tr>
        <td>Fecha</td>
        <td>Nombre</td>
        <td>Ultimo Logeo</td>
        <td>Eliminar</td>
        <td>Restaurar</td>
    </tr>    
</thead>
  <?php while($ver = mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td>
             <span class="btn btn-danger btn-sm" onclick="eliminarDia('<?php echo $ver[0]; ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[0]; ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
    <?php endwhile; ?> 
</table>
</div>

<script>
function eliminarDia(iddia) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddia=" + iddia ,
                        url:"backend/controllers/dia/EliminarDia.php",
                        success:function(r){
                             if (r==1){
                                $('#dia').load("view/dia/diaEliminar");   
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
function restaurar(iddia) {
            alertify.confirm('¿Desea Restaurar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddia=" + iddia ,
                        url:"backend/controllers/dia/Restaurar.php",
                        success:function(r){
                             if (r==1){
                                $('#dia').load("view/dia/diaEliminar");   
                                alertify.success('Restaurado Con Exito');
                            }else{
                                alertify.error('No Se Pudo Restaurar');
                            }
                        }
                    });
                },function(){
                    alertify.error('Cancelo operacion')
                });
        }
</script>

<script>
 $(document).ready(function() {
        $('#tablaDiaDataTableD').DataTable();
    } ); 
</script>