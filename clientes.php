<?php
session_start();
if(isset($_SESSION['nom_usu'])){
require_once "view/head/head2.php";
require_once "view/menu/menu.php";

?>

  
    <div class="container p-4">
    <div class="row">
                <div class="col-sm-12">
                  <span class="btn btn-outline-secondary" id="clienteAgregaBtn">Agregar Clientes</span>
                  <span class="btn btn-outline-secondary ml-2" id="clienteverBtn">Ver Clientes</span>
                  <span class="btn btn-outline-secondary ml-2" id="clientePdfBtn">Pdf Clientes</span>
                </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="clienteAgregar"></div>
                  <div id="clienteVer"></div>
                  <div id="clientePdf"></div>
              </div>
          </div>
    </div>

    <?php
        require_once "view/footer/footer.php";
    ?>
     
     <script>
        $(document).ready(function () {
                $('#clienteAgregaBtn').click(function () {
                    esconderSeccionVenta();
                    $('#clienteAgregar').load('view/clientes/clienteAgregar.php');
                    $('#clienteAgregar').show();
                });
                $('#clienteverBtn').click(function () {
                    esconderSeccionVenta();
                    $('#clienteVer').load('view/clientes/clienteVer.php');
                    $('#clienteVer').show();
                });

                $('#clientePdfBtn').click(function(){
                    esconderSeccionVenta();
                    $('#clientePdf').load('view/clientes/clientePdf.php');
                    $('#clientePdf').show();
                });

                
            });

            function esconderSeccionVenta() {
                $('#clienteAgregar').hide();
                $('#clienteVer').hide();
                $('#clientePdf').hide();
            }
    </script>
  
 <?php
   }else{
        header("location:index.php");
     }
 ?> 
