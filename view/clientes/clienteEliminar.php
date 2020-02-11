<div class="container p-4">

<?php
session_start();
  require_once "../../backend/class/conexion.php";
  $obj = new Conectar();
  $conexion = $obj->conexion();
  $sql ="SELECT cod_cli,
                nom_cli,
                ape_cli,
                ced_cli,
                rif_cli,
                ads_cli,
                cor_cli,
                tel_cli 
        FROM cliente
        WHERE est_cli='B'";
    $result=mysqli_query($conexion,$sql);            
?>

<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title">Vista Cliente</h2>
</div>

<table class="table table-hover table-bordered text-center" id="tablaClienteD">
<thead  style="background-color: #dc3545; color: white; font-weight: bold">
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Cedula</td>
        <td>Rif</td>
        <td>Direccion</td>
        <td>Correo</td>
        <td>Telefono</td>
        <?php if($_SESSION['nom_usu']=='felix'):?>
        <td>Eliminar</td>
        <td>Restaurar</td>
        <?php endif;?>
    </tr>    
</thead>
  <tbody>
  <?php while($ver = mysqli_fetch_row($result)): ?>
   
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        
        <?php if($_SESSION['nom_usu']=='felix'):?>
        <td>
             <span class="btn btn-danger btn-sm" onclick="eliminarCliente('<?php echo $ver[0]; ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-warning btn-sm" onclick="restaurar('<?php echo $ver[0]; ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <?php
         endif;
        ?>
    </tr>
    <?php endwhile; ?>
  </tbody> 
</table>
</div>

<script>

function eliminarCliente(idcliente) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcliente=" + idcliente ,
                        url:"backend/controllers/clientes/EliminarClientes.php",
                        success:function(r){
                             if (r==1){
                                $('#cliente').load('view/clientes/clienteEliminar.php');
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

function restaurar(idcliente) {
            alertify.confirm('¿Desea Restaurar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcliente=" + idcliente ,
                        url:"backend/controllers/clientes/Restaurar.php",
                        success:function(r){
                             if (r==1){
                                $('#cliente').load('view/clientes/clienteEliminar.php');
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
        $('#tablaClienteD').DataTable();
    } ); 
</script>