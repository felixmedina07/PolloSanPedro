<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion=$obj->conexion();
$sql="SELECT b.not_bnk,
             b.ncu_bnk,
             b.tpc_bnk,
             b.rcd_bnk,
             b.nom_bnk,
             b.cor_bnk,
             b.tti_bnk,
             c.nom_cli,
             b.cod_bnk       
     FROM bancos_cliente as b
     INNER JOIN cliente as c
     ON b.cod_cli=c.cod_cli
     AND b.est_bnk ='B'"; 
    $result = mysqli_query($conexion,$sql); 
?>



<div class="container p-4">
    
<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title"> Bancos Clientes</h2>
</div>

<table class="table table-hover table-bordered text-center" id="tablaBnClienteD">
    <thead>
    <tr>
        <td>Nombre titular</td>
        <td>Numero de cuenta</td>
        <td>Tipo de Cuenta</td>
        <td>Rif o Cedula</td>
        <td>Nombre del Banco</td>
        <td>Correo del Banco</td>
        <td>Telefono del titular</td>
        <td>Nombre Cliente</td>
        <td>Eliminar</td>
        <td>Restaurar</td>
    </tr>
    </thead>
   <?php while ($ver=mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[0]; ?></td>
        <td><?php echo $ver[1] ;?></td>
        <td><?php echo $ver[2] ;?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        <td>
             <span class="btn btn-danger btn-sm"  onclick="eliminarbnCliente('<?php echo $ver[8] ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <td>
             <span class="btn btn-warning btn-sm"  onclick="restaurar('<?php echo $ver[8] ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
    </tr>
   <?php endwhile; ?>
</table>
</div>

<script>
 function eliminarbnCliente(idbank) {
            alertify.confirm('¿Desea eliminar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbank=" + idbank ,
                        url:"backend/controllers/bnClientes/EliminarBnCliente.php",
                        success:function(r){
                            alert(r);
                            if (r==1){
                                $('#bancoCliente').load('view/bancos-clientes/bnClienteEliminar.php');
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
 function restaurar(idbank) {
            alertify.confirm('¿Desea Restaurar este Banco ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idbank=" + idbank ,
                        url:"backend/controllers/bnClientes/Restaurar.php",
                        success:function(r){
                            alert(r);
                            if (r==1){
                                $('#bancoCliente').load('view/bancos-clientes/bnClienteEliminar.php');
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
        $('#tablaBnClienteD').DataTable();
    } ); 
</script>
