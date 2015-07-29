 $(document).ready(function() {

   $(".numericOnly").bind('keyup input', function() {
     var input = $(this);
     input.val(input.val().replace(/[^0-9]/g, ''));
   });



   $('.lettersAndNumbers').bind('keyup input', function() {
     var input = $(this);
     input.val(input.val().replace(/[^a-z0-9A-ZñÑ´'ÁáÉéÍíÓóÚú ]/g, ''));
   });

   $('.curpValidate').bind('keyup input', function() {
     var input = $(this);
    input.val(input.val().replace(/[^A-Z0-9]/g, ''));
   });

   function lettersOnly(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = [8, 37, 39, 46, 45, 47, 94];

     tecla_especial = false
     for (var i in especiales) {
       if (key == especiales[i] || e.keyCode == 9) {
         tecla_especial = true;
         break;
       }
     }
   }


   function lettersOnly(e) {
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = [8, 37, 39, 46, 45, 47, 94];

     tecla_especial = false
     for (var i in especiales) {
       if (key == especiales[i] || e.keyCode == 9) {
         tecla_especial = true;
         break;
       }
     }

     if (letras.indexOf(tecla) == -1 && !tecla_especial)
       return false;

     if (letras.indexOf(tecla) == -1 && !tecla_especial) {
       return false;
     }
   }



 });
