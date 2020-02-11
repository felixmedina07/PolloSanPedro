<?php
session_start();
if(isset($_SESSION['nom_usu'])){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
    <div class="row">
              <div class="col-sm-12">
                  <span class="btn btn-outline-secondary" id="bncasaAgregaBtn">Agregar Bancos</span>
                  <span class="btn btn-outline-secondary ml-2" id="bncasaVerBtn">Ver Bancos</span>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="bnCasaAgregar"></div>
                  <div id="bnCasaVer"></div>
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
           $('#bncasaAgregaBtn').click(function () {
               esconderSeccionVenta();
               $('#bnCasaAgregar').load('view/bancos-casa/bnCasaAgregar.php');
               $('#bnCasaAgregar').show();
           });
           $('#bncasaVerBtn').click(function () {
               esconderSeccionVenta();
               $('#bnCasaVer').load('view/bancos-casa/bnCasaVer.php');
               $('#bnCasaVer').show();
           });
           

    });

       function esconderSeccionVenta() {
           $('#bnCasaAgregar').hide();
           $('#bnCasaVer').hide();
       }

</script>

