<?php
require_once "../../backend/class/conexion.php";
$obj= new Conectar();
$conexion = $obj->conexion();
$sql="SELECT cl.nom_cli,
             cl.ape_cli,
             u.nom_usu,
             c.cpo_cua,
             c.cpa_cua,
             c.cal_cua,
             c.cmo_cua,
             c.pre_cua,
             p.cpo_pro,
             c.cod_cua,
             cl.cod_cli,
             d.cod_des,
             p.cod_pro,
             u.cod_usu,
             p.ces_pro
      FROM cuadres AS c
      INNER JOIN cliente AS cl
      ON c.cod_cli=cl.cod_cli
      INNER JOIN despacho AS d
      ON c.cod_des=d.cod_des
      INNER JOIN productos AS p
      ON c.cod_pro=p.cod_pro
      INNER JOIN usuarios AS u
      ON c.cod_usu=u.cod_usu
      AND est_cua='A'";
 $result = mysqli_query($conexion,$sql);
?>


<div class="container p-4">
    
    <div class="card mx-auto text-white text-center bg-dark pt-2 m-4" style="width: 80%; height: 80%; border-radius:10px;">
            <h2 class="card-title"> Tabla Cuadres</h2>
    </div>

        <table class="table table-hover table-bordered text-center" id="tablaCuadresDataTable">
          <thead>
          <tr>
                <td>Nombre del cliente</td>
                <td>Nombre del Usuario</td>
                <td>Cantidad del Pollo</td>
                <td>Cantidad de Patas</td>
                <td>Cantidad de Alas</td>
                <td>Cantidad de Mollejas</td>
                <td>Precio del despacho</td>
                <td>Cantidad del Pollo Total</td>
                <td>Eliminar</td>
            </tr> 
          </thead>
            <?php while($ver=mysqli_fetch_row($result)): ?>
                <?php $can = $ver[3] * $ver[14]; ?>
                <tr>
                    <td><?php echo $ver[0]." ".$ver[1]; ?></td>
                    <td><?php echo $ver[2]; ?></td> 
                    <td><?php echo $can; ?></td>
                    <td><?php echo $ver[4]; ?></td>
                    <td><?php echo $ver[5]; ?></td>
                    <td><?php echo $ver[6]; ?></td>
                    <td><?php echo $ver[7]; ?></td>
                    <td><?php echo $ver[8]; ?></td>
                    <td>
                        <span class="btn btn-danger btn-sm"  onclick="papelera('<?php echo $ver[9] ?>')">
                            <i class="fas fa-trash"></i>
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
</div>

<script>
 function papelera(idcuadre) {
            alertify.confirm('¿Desea eliminar este Cuadre ?', 'Confirm Message',
                function(){
                    $.ajax({
                        type:"POST",
                        data:"idcuadre=" + idcuadre ,
                        url:"backend/controllers/cuadres/Papelera.php",
                        success:function(r){
                            alert(r);
                            if (r==1){
                                $('#cuadreVer').load('view/cuadres/CuadresVer.php');
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
    $(document).ready(function() {
        $('#tablaCuadresDataTable').DataTable();
    } );
</script>