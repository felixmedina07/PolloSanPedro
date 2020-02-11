<?php
require_once "view/head/head2.php";
require_once "backend/class/conexion.php";
$obj= new Conectar();
$conexion= $obj->conexion();
$sql="SELECT * FROM usuarios WHERE rol_usu='A' AND est_usu='A'";
$result=mysqli_query($conexion,$sql);
?>

<div class="container p-4">
    <div class="card mx-auto" style="width: 30rem;">
        <div class="card-title text-center pt-4 text-dark"><h2 style="font-size:40px;">Registro</h2></div>
        <div class="card-body">
            <form id="register_form" method="POST" onsubmit="return agregarUsuario()" autocomplete="off">
                <div class="form-group">
                    <label for="nom_usu">Nombre:</label>
                    <input type="text" class="form-control" id="nom_usu" name="nom_usu" placeholder="Ingrese Nombre">
                   <small id="n_error"class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="email_usu">Correo:</label>
                    <input type="email" class="form-control" id="ema_usu" name="ema_usu"  placeholder="Ingrese Email">
                    <small id="e_error" class="form-text text-muted">su email tiene que ser unico no usar repetidos</small>
                </div>
                <div class="form-group">
                    <label for="pas_usu">Contraseña:</label>
                    <input type="password" class="form-control" id="pas_usu" name="pas_usu" placeholder="Ingrese Contraseña">
                    <small id="p1-error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                    <label for="pass2_usu">Re-Contraseña</label>
                    <input type="password" class="form-control" id="pass2_usu" name="pass2_usu" placeholder="Repita Contraseña">
                    <small id="p2-error" class="form-text text-muted"></small>
                </div>
                <div class="form-group">
                <select class="form-control" id="rol_usu" name="rol_usu">
                        <option value="I">Seleccione Usuario</option>
                        <option value="V">Visitante</option>
                        <?php if (mysqli_num_rows($result) == 0): ?> 
                          <option value="A">Administrador</option>
                        <?php endif; ?>     
                </select>
                <small id="s-error" class="form-text text-muted"></small>
                </div>

                <button type="submit" class="btn btn-primary" name="user_register"><i class="fa fa-user">&nbsp;</i> Register</button>
                <span style="margin-left:2px;"><a href="index.php">Login</a></span>
            </form>
        </div>
        <div class="card-footer text-muted"><a href="#">Forget Password ?</a></div>
    </div>
</div>

<?php
 require_once "view/footer/footer.php";
?>

<script src="view/js/Usuarios/registrar/registrar.js"></script>