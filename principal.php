<?php
session_start();
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$idusuario = $_SESSION['idUsuario'];
$sql="SELECT nom_usu FROM usuarios WHERE est_usu='A' AND cod_usu='$idusuario'";
$result=mysqli_query($conexion,$sql);
$ver= mysqli_fetch_array($result);
if(isset($_SESSION['nom_usu'])){
  require_once "view/head/head2.php";
  require_once "view/menu/menu.php";
?>

  <div class="container p-4">
  
  <?php
         if (isset($_GET["msg"]) AND !empty($_GET["msg"])):
      ?>
         <div class="alert alert-success" id="alert" role="alert" style="font-size: 20px;">
            <?php echo $_GET["msg"]; ?>
        </div>
      <?php
         endif;
      ?>
  
  <div class="container pt-2">
    <div class="row">
      <div class="col-md-6">
      <div class="card" style="width: 20rem;">
        <img src="archivos/user.png" style="width: 60%; height:60%;" class="card-img-top mx-auto pt-2" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center"><?php echo strtoupper($ver[0]) ?></h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#diamodal">Registrar Dia</a>
        </div>
    </div>
      </div>
      <div class="col-md-6">
        
      </div>
    </div>



  </div>

  <div class="modal fade" id="diamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Dia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form id="frmdia" method="POST" onsubmit="return false" autocomplete="off">
                    <label for="fec_dia">Dia</label>
                    <input type="text" name="fec_dia" id="fec_dia" class="form-control" required="" readonly>
                 </form>
               </div>
               <div class="modal-footer">
                  <input  class="btn btn-dark" id="btnAgregarbnCasa" type="submit" value="Save"></input>
               </div>
            </div>
        </div>
    </div>


   <?php
      require_once "view/footer/footer.php";
   ?>
     <script src="view/js/Principal/principal.js"></script>
               
 
 <?php
}else{
      header("location:index.php");
      }
  ?> 


  
   
  
     

     

