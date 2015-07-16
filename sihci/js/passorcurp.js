$(document).ready(function() {

    $('.errordiv').hide();
    $('.cleandiv').hide();
    $('.successdiv').hide();
$('.backhome').click(function(){
	window.location = yii.urls.base;
});
    $('#Persons_curp_passport').tooltipster({ // <-  USE THE PROPER SELECTOR FOR YOUR INPUTs // default is 'hover' which is no good here
        onlyOne: false, // allow multiple tips to be open at a time
        position: 'right' // display the tips to the right of the element
    });

    if ($('#Persons_country').val() == 'México') {
        $('#Persons_curp_passport').attr('placeholder', 'CURP');
        $('.row1').css('display', '');
        $('#Persons_curp_passport').tooltipster('content', 'CURP');
    } else {
        $('#Persons_curp_passport').attr("placeholder", "Pasaporte");
        $('.row1').css('display', 'none');
        $('#Persons_curp_passport').tooltipster('content', 'Pasaporte');
    }
    $('#Persons_country').on('change', function() {
        if ($('#Persons_country').val() == 'México') {
            $('#Persons_curp_passport').attr('placeholder', 'CURP');
            $('.row1').css('display', '');
            $('#Persons_curp_passport').tooltipster('content', 'CURP');
        } else {
            $('#Persons_curp_passport').attr('placeholder', 'Pasaporte');
            $('.row1').css('display', 'none');
            $('#Persons_curp_passport').tooltipster('content', 'Pasaporte');
        }
    });

    $('.cleanbutton').click(function() {
        $('.cleandiv').show();
    });

 /*   $('.savebutton').click(function() {
        $('.successdiv').show();
    }); */

$('select').unbind('blur');

});