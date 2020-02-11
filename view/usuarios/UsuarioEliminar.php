<?php 
    require_once "../../backend/class/conexion.php";
    $obj= new Conectar();
    $conexion= $obj->conexion();
    $sql="SELECT cod_usu,nom_usu,ema_usu,rol_usu,las_usu FROM usuarios WHERE est_usu='B'";
    $result=mysqli_query($conexion,$sql); 
  ?>   


<div class="container p-4">

        <div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
            <h2 class="card-title">Usuarios</h2>
        </div>

    <table class="table table-hover table-bordered text-center" id="tablaUsuarioD">
        <thead  style="background-color: #dc3545; color: white; font-weight: bold">
            <tr>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Rol</td>
                <td>Ultimo logeo</td>
                <td>Eliminar</td>
                <td>Restaurar</td>
        </thead>
        <?php while($ver = mysqli_fetch_row($result)): ?>
            <tr>
                <td><?php echo $ver[1]; ?></td>
                <td><?php echo $ver[2]; ?></td>
                <td><?php echo $ver[3]; ?></td>
                <td><?php echo $ver[4]; ?></td>
                <td>
                    <span class="btn btn-danger btn-sm" onclick="eliminarUsuario('<?php echo $ver[0]; ?>')">
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

 <script>

function eliminarUsuario(idusuario) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario ,
                        url:"backend/controllers/usuarios/EliminarUsuario.php",
                        success:function(r){
                             if (r==1){
                                $('#usuario').load('view/usuarios/UsuarioEliminar.php');
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

function restaurar(idusuario) {
            alertify.confirm('¿Desea Restaurar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario ,
                        url:"backend/controllers/usuarios/Restaurar.php",
                        success:function(r){
                             if (r==1){
                                $('#usuario').load('view/usuarios/UsuarioEliminar.php');
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
        $('#tablaUsuarioD').DataTable();
    } );
</script>