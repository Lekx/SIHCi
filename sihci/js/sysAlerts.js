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
        $('[id^=Addresses_]').val('');
        $('[id^=Sponsors_]').val('');
        $('[id^=Jobs_]').val('');
        $('[id^=getResearch]').val('');
        $('[id^=getTypeEmail]').val('');
        $('[id^=getEmail]').val('');
        $('[id^=Persons_]').val('');
        $('[id^=Curriculum_]').val('');
        $('.savebutton').val('Guardar');
        $('.cleanbutton').val('Borrar');
        $('#cancelar').val('Cancelar');
    
    });
});