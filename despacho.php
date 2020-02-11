<?php
session_start();
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
                <div class="col-sm-6">
                  <span class="btn btn-outline-secondary" id="despachoAgregaBtn">Agregar Despachos</span>
                  <span class="btn btn-outline-secondary ml-2" id="despachoverBtn">Ver Despachos</span>
                  <span class="btn btn-outline-secondary ml-2" id="despachoPdfBtn">Pdf Despachos</span>
                </div>
               <?php if($_SESSION['rol']=='A'): ?> 
                <div class="col-sm-6 d-flex justify-content-end">
                 <a href="cuadres.php" class="btn btn-outline-secondary" id="">Cuadres</a>
                </div>
               <?php endif; ?> 
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="despachoAgregar"></div>
                  <div id="despachoVer"></div>
                  <div id="despachoPdf"></div>
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
           $('#despachoAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#despachoAgregar').load('view/despacho/DespachoAgregar.php');
               $('#despachoAgregar').show();
           });
           $('#despachoverBtn').click(function () {
               esconderSeccionVenta();
               $('#despachoVer').load('view/despacho/DespachoVer.php');
               $('#despachoVer').show();
           });


           $('#despachoPdfBtn').click(function(){
              esconderSeccionVenta();
              $('#despachoPdf').load('view/despacho/DespachoPdf.php');
              $('#despachoPdf').show();
           });

        
    });

       function esconderSeccionVenta() {
           $('#despachoAgregar').hide();
           $('#despachoVer').hide();
           $('#despachoPdf').hide();
       }
</script>