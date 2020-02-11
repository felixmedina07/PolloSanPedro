<?php
session_start();
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";    
?>
<div class="container p-4">
    <div class="row">
              <div class="col-sm-12">
                  <span class="btn btn-outline-secondary" id="bnclienteAgregaBtn">Agregar Bancos Clientes</span>
                  <span class="btn btn-outline-secondary ml-2" id="bnclienteVerBtn">Ver Bancos Clientes</span>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="bnClienteAgregar"></div>
                  <div id="bnClienteVer"></div>
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
           $('#bnclienteAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#bnClienteAgregar').load('view/bancos-clientes/bnClienteAgregar.php');
               $('#bnClienteAgregar').show();
           });
           $('#bnclienteVerBtn').click(function () {
               esconderSeccionVenta();
               $('#bnClienteVer').load('view/bancos-clientes/bnClienteVer.php');
               $('#bnClienteVer').show();
           });

    });

       function esconderSeccionVenta() {
           $('#bnClienteAgregar').hide();
           $('#bnClienteVer').hide();
       }

</script>

