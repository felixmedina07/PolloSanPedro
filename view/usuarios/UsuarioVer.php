<?php 
    require_once "../../backend/class/conexion.php";
    $obj= new Conectar();
    $conexion= $obj->conexion();
    $sql="SELECT cod_usu,nom_usu,ema_usu,rol_usu,las_usu FROM usuarios WHERE est_usu='A'";
    $result=mysqli_query($conexion,$sql); 
  ?>   


<div class="container p-4">

        <div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
            <h2 class="card-title">Usuarios</h2>
        </div>

    <table class="table table-hover table-bordered text-center" id="tablaUsuario">
    <thead  style="background-color: #dc3545; color: white; font-weight: bold">
        <tr>
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Rol</td>
            <td>Ultimo logeo</td>
            <td>Editar</td>
            <td>Eliminar</td>
    </thead>
    <?php while($ver = mysqli_fetch_row($result)): ?>
        <tr>
            <td><?php echo $ver[1]; ?></td>
            <td><?php echo $ver[2]; ?></td>
            <td><?php echo $ver[3]; ?></td>
            <td><?php echo $ver[4]; ?></td>
            <td>
            <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalUsuario" onclick="agregaDatosUsuario('<?php echo $ver[0]; ?>')">
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
<!-- MODAL PARA OBTENER Y ACTUALIZAR CLIENTE -->
 <!-- Modal -->
 <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmUsuarioU">
                        <input type="text" name="idusuario" hidden="" id="idusuario">
                        <label for="nom_usuU">Nombre</label>
                        <input type="text" name="nom_usuU" id="nom_usuU" class="form-control">
                        <label for="ema_usuU">Correo</label>
                        <input type="text" name="ema_usuU" id="ema_usuU" class="form-control">
                        <label for="rol_usuU">Rol</label>
                        <select class="form-control" id="rol_usuU" name="rol_usuU">
                            <option value="I">Seleccione Usuario</option>
                            <option value="V">Visitante</option>
                            <option value="S">Secretaria</option>
                            <option value="A">Administrador</option>
                         
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnUsuarioUpdate" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

 <script>
    function agregaDatosUsuario(idusuario){
            $.ajax({
                type: "POST",
                data: "idusuario=" + idusuario,
                url: "backend/controllers/usuarios/ObtenerUsuario.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idusuario').val(datos['cod_usu']);
                    $('#nom_usuU').val(datos['nom_usu']);
                    $('#ema_usuU').val(datos['ema_usu']);
                    $('#rol_usuU').val(datos['rol_usu']);
                }
            });
        }

function papelera(idusuario) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idusuario=" + idusuario ,
                        url:"backend/controllers/usuarios/Papelera.php",
                        success:function(r){
                             if (r==1){
                                $('#usuarioVer').load('view/usuarios/UsuarioVer.php');
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
           $('#btnUsuarioUpdate').click(function () {
               datos=$('#frmUsuarioU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/usuarios/ActualizarUsuario.php",
                   success:function(r){
                       alert(r);
                       if (r==1){
                           $('#frmUsuarioU')[0].reset();
                           $('#usuarioVer').load('view/usuarios/UsuarioVer.php');
                           alertify.success("Usuario actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar Usuario");
                       }
                   }
               });
           });
        });


        $(document).ready(function() {
        $('#tablaUsuario').DataTable();
    } );
    </script>