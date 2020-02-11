<?php
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] == 'A'){
require_once "view/head/head2.php";
require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
              <div class="col-sm-12">
                  <span class="btn btn-outline-secondary" id="productoAgregaBtn">Agregar Productos</span>
                  <span class="btn btn-outline-secondary ml-2" id="productoverBtn">Ver Productos</span>
                  <span class="btn btn-outline-secondary ml-2" id="productoPdfBtn">Pdf Productos</span>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="productoAgregar"></div>
                  <div id="productoVer"></div>
                  <div id="productoPdf"></div>
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
           $('#productoAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#productoAgregar').load('view/producto/productoAgregar.php');
               $('#productoAgregar').show();
           });
           $('#productoverBtn').click(function () {
               esconderSeccionVenta();
               $('#productoVer').load('view/producto/productoVer.php');
               $('#productoVer').show();
           });
        
           $('#productoPdfBtn').click(function(){
            esconderSeccionVenta();
            $('#productoPdf').load('view/producto/productoPdf.php');
            $('#productoPdf').show();
           });

    });

       function esconderSeccionVenta() {
           $('#productoAgregar').hide();
           $('#productoVer').hide();
           $('#productoPdf').hide();
       }

      

</script>