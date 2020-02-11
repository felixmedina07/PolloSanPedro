<?php
session_start();
if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'){
    require_once "view/head/head2.php";
    require_once "view/menu/menu.php";
?>

<div class="container p-4">
          <div class="row">
              <div class="col-sm-12">
                  <span class="btn btn-outline-secondary" id="usuarioVerbtn">Ver Usuario</span>
              </div>
          </div>
          <div class="row">
              <div class="col-sm-12">
                  <div id="usuarioVer"></div>
                
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
           $('#usuarioVerbtn').click(function () {
               esconderSeccionVenta();
               $('#usuarioVer').load('view/usuarios/UsuarioVer.php');
               $('#usuarioVer').show();
           });
          
    });

       
    function esconderSeccionVenta() {
           $('#usuarioVer').hide();
       }

 $(document).ready(function(){
     $('#usuarioVerbtn').on('dblclick', function(){
        $('#usuarioVer').hide();
     })
 })
      

</script>

