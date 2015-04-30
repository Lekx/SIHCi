$(document).ready(function() {
    $('.backbut').click(function() {
        $('.cleandiv').hide();
        $('.successdiv').hide();
        $('.errordiv').hide();
    });
     $('.errorbut').click(function() {
        $('.cleandiv').hide();
        $('.successdiv').hide();
        $('.errordiv').hide();
    });
    $('.cleanbut').click(function() {
        $('.cleandiv').hide();
        $('input , select').val('');
        $('.savebutton').val('Guardar');
        $('.cleanbutton').val('Borrar');
        $('#cancelar').val('Cancelar');
    });
});