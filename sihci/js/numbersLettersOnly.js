 $(document).ready(function() {

   $(".numericOnly").keydown(function(e) {
     if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
       (e.keyCode == 65 && e.ctrlKey === true) ||
       (e.keyCode >= 35 && e.keyCode <= 40)) {
       return;
     }
     if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode >
         105)) {
       e.preventDefault();
     }
   });


   $(".numericOnly").bind('keyup input', function() {
     var input = $(this);
     input.val(input.val().replace(/[^0-9]/g, ''));
   });



   $('.lettersAndNumbers').bind('keyup input', function() {
     var input = $(this);
     input.val(input.val().replace(/[^a-z0-9A-ZñÑ´'ÁáÉéÍíÓóÚú ]/g, ''));
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
