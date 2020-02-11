<?php
session_start();
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

  <div class="container p-4">
          <div class="row">
                <div class="col-sm-6">
                  <span class="btn btn-outline-secondary" id="cuentaAgregaBtn">Agregar Cuentas </span>
                  <span class="btn btn-outline-secondary ml-2" id="cuentaverBtn">Ver Cuentas</span>
                  <span class="btn btn-outline-secondary ml-2" id="cuentaPdfBtn">Pdf Cuentas</span>
                </div>
                <?php if($_SESSION['rol']=='A'): ?> 
                <div class="col-sm-6 d-flex justify-content-end">
                <span class="btn btn-outline-secondary " id="cuentaUpdateBtn">Actualizar Cuentas</span>
                </div>
               <?php endif; ?> 
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="cuentaAgregar"></div>
                  <div id="cuentaVer"></div>
                  <div id="cuentaPdf"></div>
                  <div id="cuentaUpdate"></div>
              </div>
          </div>
  </div>

  
 <?php
}else{
  header("location:index.php");
     }
 ?> 
<?php
 require_once "view/footer/footer.php";
?>

<script>
$(document).ready(function () {
           $('#cuentaAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#cuentaAgregar').load('view/cuentas/CuentasAgregar.php');
               $('#cuentaAgregar').show();
           });
           $('#cuentaverBtn').click(function () {
               esconderSeccionVenta();
               $('#cuentaVer').load('view/cuentas/CuentasVer.php');
               $('#cuentaVer').show();
           });


           $('#cuentaPdfBtn').click(function(){
              esconderSeccionVenta();
              $('#cuentaPdf').load('view/cuentas/CuentasPdf.php');
              $('#cuentaPdf').show();
           });

           $('#cuentaUpdateBtn').click(function(){
              esconderSeccionVenta();
              $('#cuentaUpdate').load('view/cuentas/CuentasUpdate.php');
              $('#cuentaUpdate').show();
           });

        
    });

       function esconderSeccionVenta() {
           $('#cuentaAgregar').hide();
           $('#cuentaVer').hide();
           $('#cuentaPdf').hide();
           $('#cuentaUpdate').hide();
       }
</script> 
