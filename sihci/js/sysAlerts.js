$(document).ready(function() {
    $('.backbut').click(function() {
        $('.cleandiv').hide();
    });
    $('.cleanbut').click(function() {
        $('.cleandiv').hide();
        $('input , select').val('');
        $('.savebutton').val('Guardar');
        $('.cleanbutton').val('Borrar');
        $('#cancelar').val('Cancelar');
    });
});