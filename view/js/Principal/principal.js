
      $(document).ready(function(){
        $('#alert').fadeIn();
        setTimeout(function(){  
          $("#alert").fadeOut();
        }, 1900);
      });
       
      $(function() {
             var fechaA = new Date();
             var yyyy = fechaA.getFullYear();

             $("#fec_dia").datepicker({
                 changeMonth: true,
                 changeYear: true,
                 yearRange: '1900:' + yyyy,
                 dateFormat: "yy-dd-mm"
             });

         });

         $(document).ready(function(){
           $('#btnAgregarbnCasa').click(function(){
            datos=$('#frmdia').serialize();
            $.ajax({
                type:"POST",
                data:datos,
                url:"backend/controllers/dia/AgregarDia.php",
                success:function(r){
                        console.log(r);
                        alert(r);
                    if (r==1){
                        $('#frmdia')[0].reset();
                        alertify.success("Banco agregado con exito");
                    }else{
                        alertify.error("No se pudo agregar Banco");
                    }
                }
            });
           });
         });
 