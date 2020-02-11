<?php
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
              <div class="col-sm-6">
                  <span class="btn btn-outline-secondary mr-2" id="cuadreAgregarBtn">Agregar Cuadre</span>
                  <span class="btn btn-outline-secondary mr-2" id="cuadreVerBtn">Ver Cuadre</span>
                  <span class="btn btn-outline-secondary" id="cuadreDAgregarBtn">Modificar Despacho</span>
              </div>
              <div class="col-sm-6 d-flex justify-content-end">
                <a href="despacho.php" class="btn btn-outline-secondary" id="">Despachos</a>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="cuadreAgregar"></div>
                  <div id="cuadreVer"></div>
                  <div id="DespachoM"></div>
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
           $('#cuadreAgregarBtn').click(function () {
               esconderSeccionVenta();
               $('#cuadreAgregar').load('view/cuadres/CuadresAgregar.php');
               $('#cuadreAgregar').show();
           });

          
    });

    $(document).ready(function () {
           $('#cuadreVerBtn').click(function () {
               esconderSeccionVenta();
               $('#cuadreVer').load('view/cuadres/CuadresVer.php');
               $('#cuadreVer').show();
           });

          
    });

    $(document).ready(function () {
           $('#cuadreDAgregarBtn').click(function () {
               esconderSeccionVenta();
               $('#DespachoM').load('view/cuadres/CuadresDAgregar.php');
               $('#DespachoM').show();
           });

          
    });

       
    function esconderSeccionVenta() {
           $('#cuadreAgregar').hide();
           $('#cuadreVer').hide();
           $('#DespachoM').hide();
       }

  

</script>