function agregarUsuario() {
    var status = false;
    var nombre = $("#nom_usu");
    var correo = $("#ema_usu");
    var pass = $("#pas_usu");
    var pass2 = $("#pass2_usu");
    var rol = $("#rol_usu");
    var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
    if (nombre.val() == "" || nombre.val().length < 2 || nombre.val() > 0) {
        nombre.addClass("form-r");
        $("#n_error").html("<span class='text-danger'>Ingrese un nombre mayor a 2 letras.</span>")
        status = false;
    }else{
      nombre.removeClass("border-danger");
      $("#n_error").html("");
      status = true;
    }
 
    if(!e_patt.test(correo.val())){
      correo.addClass("border-danger");
      $("#e_error").html("<span class='text-danger'>Ingrese Un Correo Valido</span>")
    }else{
      correo.removeClass("border-danger");
      $("#e_error").html("");
      status = true;
    }
    
    if(pass.val() == "" || pass.val().length < 4){
        pass.addClass("border-danger");
        $("#p1-error").html("<span class='text-danger'>Ingrese una contraseña con mas de 4 carateres</span>")
       status = false;
    }else{
      pass.removeClass("border-danger");
      $("#p1-error").html("");
      status = true;
    }

    if(pass2.val() == "" || pass2.val().length < 4 ){
        pass2.addClass("border-danger");
        $("#p2-error").html("<span class='text-danger'>Ingrese una contraseña con mas de 4 carateres</span>");
        status = false;
       }else{
           pass2.removeClass("border-danger");
           $("#p2-error").html("");
           status = true;
       }

    if(rol.val() == ""){
        rol.addClass("border-danger");
        $("#s-error").html("<span class='text-danger'>Ingrese un Cargo</span>");
        status = false;
       }else{
           rol.removeClass("border-danger");
           $("#s-error").html("");
           status = true;
       }

    if((pass.val() == pass2.val()) && status == true){
        if(status){
            var DOMAIN = "http://localhost/PolloSanPedro";
            $.ajax({
            method: "POST",
            data: $('#register_form').serialize(),
            url: "backend/controllers/login/agregaUsuario.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#register_form')[0].reset();
                    window.location.href = encodeURI(DOMAIN+"/index.php?msg=Registrado Con exito"); 
                } else if (respuesta == 2) {
                    alertify.success("Este Usuario ya exite!! ");
                } else {
                    console.log(respuesta);
                    alertify.error( "Fallo al Agregar");
                }
            }
        });
        }
    }   

    return false;
}