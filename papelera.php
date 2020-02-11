<?php
session_start();

if(isset($_SESSION['nom_usu']) && $_SESSION['rol'] =='A'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

  <div class="container p-4">
          <div class="row">
                <div class="col-sm-12">
                  <span class="btn btn-outline-secondary" id="productoBtn">Producto</span>
                  <span class="btn btn-outline-secondary ml-2" id="clienteBtn">Cliente</span>
                  <span class="btn btn-outline-secondary ml-2" id="bancoBtn">Bancos</span>
                  <span class="btn btn-outline-secondary ml-2" id="bancoClienteBtn">Bancos Clientes</span>
                  <span class="btn btn-outline-secondary ml-2" id="despachoBtn">Despachos</span>
                  <span class="btn btn-outline-secondary ml-2" id="cuentaBtn">Cuentas</span>
                  <span class="btn btn-outline-secondary ml-2" id="cuadreBtn">Cuadre</span>
                  <span class="btn btn-outline-secondary ml-2" id="usuarioBtn">Usuarios</span>
                  <span class="btn btn-outline-secondary ml-2" id="diaBtn">Dias</span>
                </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="producto"></div>
                  <div id="cliente"></div>
                  <div id="banco"></div>
                  <div id="bancoCliente"></div>
                  <div id="despacho"></div>
                  <div id="cuenta"></div>
                  <div id="cuadre"></div>
                  <div id="usuario"></div>
                  <div id="dia"></div>
              </div>
          </div>
  </div>
 
  <?php
    require_once "view/footer/footer.php";
 ?>
 
 <?php
   }else{
    header("location:index.php");
     }
 ?> 


<script>
$(document).ready(function () {
           $('#productoBtn').click(function () {
               esconderSeccionVenta();
               $('#producto').load('view/producto/productoEliminar.php');
               $('#producto').show();
           });
           $('#clienteBtn').click(function () {
               esconderSeccionVenta();
               $('#cliente').load('view/clientes/ClienteEliminar.php');
               $('#cliente').show();
           });

           $('#bancoBtn').click(function () {
               esconderSeccionVenta();
               $('#banco').load('view/bancos-casa/bnCasaEliminar.php');
               $('#banco').show();
           });

           $('#bancoClienteBtn').click(function(){
              esconderSeccionVenta();
              $('#bancoCliente').load('view/bancos-clientes/bnclienteEliminar.php');
              $('#bancoCliente').show();
           });

           $('#despachoBtn').click(function(){
              esconderSeccionVenta();
              $('#despacho').load('view/despacho/DespachoEliminar.php');
              $('#despacho').show();
           });

           $('#cuentaBtn').click(function(){
              esconderSeccionVenta();
              $('#cuenta').load('view/cuentas/CuentaEliminar.php');
              $('#cuenta').show();
           });

           $('#cuadreBtn').click(function(){
              esconderSeccionVenta();
              $('#cuadre').load('view/cuadres/CuadresEliminar.php');
              $('#cuadre').show();
           });

           $('#usuarioBtn').click(function(){
              esconderSeccionVenta();
              $('#usuario').load('view/usuarios/UsuarioEliminar.php');
              $('#usuario').show();
           });

           $('#diaBtn').click(function(){
              esconderSeccionVenta();
              $('#dia').load('view/dia/DiaEliminar.php');
              $('#dia').show();
           });
        
    });

       function esconderSeccionVenta() {
           $('#producto').hide();
           $('#cliente').hide();
           $('#banco').hide();
           $('#bancoCliente').hide();
           $('#despacho').hide();
           $('#cuenta').hide();
           $('#cuadre').hide();
           $('#usuario').hide();
           $('#dia').hide();
       }
</script>