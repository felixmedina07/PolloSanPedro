function login() {
    var status = false;
    var nombre = $("#nom_usu");
    var pass = $("#pas_usu");

    if (nombre.val() == "") {
        nombre.addClass("border-danger");
        $("#n_error").html("<span class='text-danger'>Ingrese un nombre.</span>")
        status = false;
    }else{
      nombre.removeClass("border-danger");
      $("#n_error").html("");
      status = true;
    }
 
    
    if(pass.val() == ""){
        pass.addClass("border-danger");
        $("#p-error").html("<span class='text-danger'>Ingrese una contraseña con mas de 4 carateres</span>")
       status = false;
    }else{
      pass.removeClass("border-danger");
      $("#p-error").html("");
      status = true;
    }

        if(status){
            var DOMAIN = "http://localhost/PolloSanPedro";
            $.ajax({
            method: "POST",
            data: $('#login_form').serialize(),
            url: "backend/controllers/login/login.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();
                console.log(respuesta);
                if (respuesta == 1) {
                    $('#login_form')[0].reset();
                    window.location.href = encodeURI(DOMAIN+"/principal.php?msg=Bienvenido"); 
                }else {
                    alertify.error( "Fallo al Agregar");
                }
            }
        });
        }

    return false;
}