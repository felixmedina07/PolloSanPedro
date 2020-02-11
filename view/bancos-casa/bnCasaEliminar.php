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
       WHERE  est_bnc='B'";
   $result = mysqli_query($conexion,$sql);   
?>

<table class="table table-hover table-bordered text-center" id="tablaBnCasaD">
    <thead>
    <tr>
        <td>Nombre del Banco</td>
        <td>Numero De Cuenta</td>
        <td>Rif del Banco</td>
        <td>Correo Del Banco</td>
        
       <?php if(($_SESSION['nom_usu']=='felix')):?>
        <td>Eliminar</td>
        <td>Restaurar</td>
       <?php endif; ?>
    </tr>
    </thead>
  <?php while($ver=mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[3]  ?> </td>
        <td><?php echo $ver[1]  ?> </td>
        <td><?php echo $ver[2]  ?> </td>
        <td><?php echo $ver[4]  ?> </td>
        <td>
             <span class="btn btn-danger btn-sm" onclick="eliminarbnCasa('<?php echo $ver[0];?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[0];?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
       <?php endwhile; ?>
</table>
</div>


<script>
 function eliminarbnCasa(idbanc) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbanc=" + idbanc ,
                        url:"backend/controllers/bnCasa/EliminarbnCasa.php",
                        success:function(r){
                            if (r==1){
                                $('#banco').load('view/bancos-casa/bnCasaEliminar.php');
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
 function restaurar(idbanc) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbanc=" + idbanc ,
                        url:"backend/controllers/bnCasa/Restaurar.php",
                        success:function(r){
                            alert(r);
                            console.log(r);
                            if (r==1){
                                $('#banco').load('view/bancos-casa/bnCasaEliminar.php');
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
        $('#tablaBnCasaD').DataTable();
    } ); 
</script>