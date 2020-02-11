<?php
    session_start(); 
    if(isset($_SESSION['nom_usu']) && $_SESSION['rol']=='A'){ 
        require_once "view/head/head2.php"; 
        require_once "view/menu/menu.php";
     ?>
 
      <div class="container p-4">
      <div class="row">
          <div class="col-md-12">
          <div class="card mx-auto text-white text-center bg-dark pt-2 " style="width: 80%; height: 80%; border-radius:10px;">
                <h2 class="card-title">Vista Dia</h2>
          </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12">
              <div id="diaVer"></div>
          </div>
      </div>
      </div>
    
    
    <?php require_once "view/footer/footer.php"; ?>

    <?php }else{
        header("location:index.php");
     } ?>


     <script>
       $(document).ready(function(){
          $('#diaVer').load('view/dia/DiaVer.php');
       });
     
     </script>



