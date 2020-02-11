<?php
require_once "view/head/head2.php";
?>

<div class="container p-4">
      <?php
         if (isset($_GET["msg"]) AND !empty($_GET["msg"])):
      ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET["msg"]; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <?php
         endif;
      ?>
    <div class="card mx-auto" style="width: 20rem;">
        <h2 class="card-title text-center">Ingresar</h2>
        <div class="card-body">
            <form id="login_form" onsubmit="return login()" autocomplete="off">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre</label>
                    <input type="text" class="form-control" id="nom_usu" name="nom_usu" placeholder="Enter Email">
                    <small id="n_error" class="form-text text-muted">Recuerda Ingresar tu nombre</small>
                </div>
                <div class="form-group">
                    <label for="pas_usu">Password</label>
                    <input type="password" class="form-control" id="pas_usu" name="pas_usu" placeholder="Enter Password">
                    <small id="p1_error"class="form-text text-muted"></small>
                </div>
                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-lock">&nbsp;</i> Login</button>
                <span style="margin-left:2px;"><a href="registrar.php">Register</a></span>
            </form>
        </div>
        <div class="card-footer"><a href="#">Forget Password ?</a></div>
    </div>
</div>


<?php
 require_once "view/footer/footer.php";
?>

<script src="view/js/Usuarios/login/login.js">
</script>
