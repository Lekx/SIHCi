$(document).ready(function() {
    $('.backbut').click(function() {
        /*$('.cleandiv').hide();
        $('.successdiv').hide();
        $('.errordiv').hide();
        $('.abortdiv').hide();*/
        window.location = yii.urls.back;

    });
    $('.errorbut').click(function() {
        $('.cleandiv').hide();
        $('.successdiv').hide();
        $('.errordiv').hide();
        $('.errordivuser').hide();
        $('.abortdiv').hide();

    });
    /*$('.cleanbut').click(function() {
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
        $('[id^= SponsorBilling]').val('');

    });*/
/*
    $('.summary').remove();
	$('.delete').click(function(e) {
		var url = $('.delete').attr('href');
		$('.deleter').click(function(){
			window.location= url+'?'+'ajax=postdegree-graduates-grid';
		});
        e.preventDefault();
        $('#myModal').modal('toggle');
		return false;
    });
*/
});