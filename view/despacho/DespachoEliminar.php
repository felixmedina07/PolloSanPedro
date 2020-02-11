<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT d.cod_des,
             c.nom_cli,
             d.pre_des,
             d.prd_des,
             d.cpo_des,
             d.cpa_des,
             d.cal_des,
             d.cmo_des,
             d.pok_des,
             d.pak_des,
             d.alk_des,
             d.mok_des,
             d.ppo_des,
             d.ppa_des,
             d.pal_des,
             d.pmo_des
      FROM despacho AS d
      INNER JOIN cliente AS c
      ON d.cod_cli=c.cod_cli
      AND d.est_des='B'";
      $result = mysqli_query($conexion,$sql); 
?>



<div class="container p-4">
    
<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title"> Despachos</h2>
</div>

<table class="table table-hover  table-bordered text-center" id="tablaDespachotableD">
   <thead>
   <tr>
        <td>Nombre del Cliente</td>
        <td>Precio del Despacho Bolivar</td>
        <td>Precio del Despacho Dolar</td>
        <td>Cantidad Pollo</td>
        <td>Cantidad Patas</td>
        <td>Cantidad Alas</td>
        <td>Cantidad Mollejas</td>
        <td>KG Pollo</td>
        <td>KG Patas</td>
        <td>KG Alas</td>
        <td>KG Mollejas</td>
        <td>Precio Pollo</td>
        <td>Precio Patas</td>
        <td>Precio Alas</td>
        <td>Precio Mollejas</td>
        <td>Eliminar</td>
        <td>Restaurar</td>
    </tr>
   </thead>
   <?php while ($ver=mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2] ;?></td>
        <td><?php echo $ver[3] ;?></td>
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
        <td>
             <span class="btn btn-danger btn-sm"  onclick="eliminarDespacho('<?php echo $ver[0]?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-warning btn-sm"  onclick="restaurar('<?php echo $ver[0]?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
   <?php endwhile; ?>
</table>
</div>

<script>
 function eliminarDespacho(iddespacho) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddespacho=" + iddespacho ,
                        url:"backend/controllers/despachos/EliminarDespacho.php",
                        success:function(r){
                            alert(r);
                            if (r==1){
                                $('#despacho').load('view/despacho/DespachoEliminar.php');
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
 function restaurar(iddespacho) {
            alertify.confirm('¿Desea restaurar este despacho ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"iddespacho=" + iddespacho ,
                        url:"backend/controllers/despachos/Restaurar.php",
                        success:function(r){
                            alert(r);
                            if (r==1){
                                $('#despacho').load('view/despacho/DespachoEliminar.php');
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
        $('#tablaDespachotableD').DataTable({
            "scrollX": "90%",
            "scrollCollapse": false
        });
    } );
</script>