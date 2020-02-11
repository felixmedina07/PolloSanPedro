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
        WHERE est_cli='A'";
    $result=mysqli_query($conexion,$sql);            
?>

<div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
          <h2 class="card-title">Vista Cliente</h2>
</div>

<table class="table table-hover table-bordered text-center" id="tablaClienteDataTable">
<thead  style="background-color: #dc3545; color: white; font-weight: bold">
    <tr>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Cedula</td>
        <td>Rif</td>
        <td>Direccion</td>
        <td>Correo</td>
        <td>Telefono</td>
        <td>Editar</td>
        <?php if($_SESSION['nom_usu']=='felix'):?>
        <td>Eliminar</td>
        <?php endif;?>
    </tr>    
</thead>
  <?php while($ver = mysqli_fetch_row($result)): ?>
    <tr>
        <td><?php echo $ver[1]; ?></td>
        <td><?php echo $ver[2]; ?></td>
        <td><?php echo $ver[3]; ?></td>
        <td><?php echo $ver[4]; ?></td>
        <td><?php echo $ver[5]; ?></td>
        <td><?php echo $ver[6]; ?></td>
        <td><?php echo $ver[7]; ?></td>
        <td>
           <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="agregaDatosCliente('<?php echo $ver[0]; ?>')">
             <i class="fas fa-pencil-alt"></i>
            </span>
        </td>
        <?php if($_SESSION['nom_usu']=='felix'):?>
        <td>
             <span class="btn btn-danger btn-sm" onclick="papelera('<?php echo $ver[0]; ?>')">
                <i class="fas fa-trash"></i>
            </span>
        </td>
        <?php
         endif;
        ?>
    </tr>
    <?php endwhile; ?> 
</table>
</div>

<!-- MODAL PARA OBTENER Y ACTUALIZAR CLIENTE -->
 <!-- Modal -->
 <div class="modal fade" id="abremodalClientesUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmClientesU">
                        <input type="text" name="idcliente" hidden="" id="idcliente">
                        <label for="nom_cliU">Nombre</label>
                        <input type="text" name="nom_cliU" id="nom_cliU" class="form-control">
                        <label for="ape_cliU">Apellido</label>
                        <input type="text" name="ape_cliU" id="ape_cliU" class="form-control">
                        <label for="ced_cliU">Cedula</label>
                        <input type="text" name="ced_cliU" id="ced_cliU" class="form-control">
                        <label for="rif_cliU">Rif</label>
                        <input type="text" name="rif_cliU" id="rif_cliU" class="form-control">
                        <label for="ads_cliU">Direccion</label>
                        <input type="text" name="ads_cliU" id="ads_cliU" class="form-control">
                        <label for="cor_cliU">Correo</label>
                        <input type="email" name="cor_cliU" id="cor_cliU" class="form-control">
                        <label for="tel_cliU">Telefono</label>
                        <input type="text" name="tel_cliU" id="tel_cliU" class="form-control">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnAgregarClienteU" class="btn btn-primary" data-dismiss="modal">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

  

<script>

function agregaDatosCliente(idcliente){
            $.ajax({
                type: "POST",
                data: "idcliente=" + idcliente,
                url: "backend/controllers/clientes/ObtenerClientes.php",
                success: function(r) {
                    datos = jQuery.parseJSON(r);
                    $('#idcliente').val(datos['cod_cli']);
                    $('#nom_cliU').val(datos['nom_cli']);
                    $('#ape_cliU').val(datos['ape_cli']);
                    $('#ced_cliU').val(datos['ced_cli']);
                    $('#rif_cliU').val(datos['rif_cli']);
                    $('#ads_cliU').val(datos['ads_cli']);
                    $('#cor_cliU').val(datos['cor_cli']);
                    $('#tel_cliU').val(datos['tel_cli']);
                }
            });
        }

function papelera(idcliente) {
            alertify.confirm('¿Desea eliminar esta categoria ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcliente=" + idcliente ,
                        url:"backend/controllers/clientes/Papelera.php",
                        success:function(r){
                             if (r==1){
                                $('#clienteVer').load('view/clientes/clienteVer.php');
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
           $('#btnAgregarClienteU').click(function () {
               datos=$('#frmClientesU').serialize();
               $.ajax({
                   type:"POST",
                   data:datos,
                   url:"backend/controllers/clientes/ActualizarClientes.php",
                   success:function(r){
                       alert(r);
                       if (r==1){
                           $('#frmClientesU')[0].reset();
                           $('#clienteVer').load('view/clientes/clienteVer.php');
                           alertify.success("Cliente actualizado con exito");
                       }else{
                           alertify.error("No se pudo actualizar cliente");
                       }
                   }
               });
           });
        });


        $(document).ready(function() {
        $('#tablaClienteDataTable').DataTable();
    } );
    </script>

