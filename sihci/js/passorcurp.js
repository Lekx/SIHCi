$(document).ready(function() {
  
    $('.errordiv').hide();
    $('.cleandiv').hide();
    $('.successdiv').hide();

    if ($('#Persons_country').val() == 'Mexico') {
        $('#Persons_curp_passport').attr('placeholder', 'CURP');
        $('#Persons_state_of_birth').css('display', '');
    } else {
        $('#Persons_curp_passport').attr("placeholder", "Pasaporte");
        $('#Persons_state_of_birth').css('display', 'none');
    }
    $('#Persons_country').on('change', function() {
        if ($('#Persons_country').val() == 'Mexico') {
            $('#Persons_curp_passport').attr('placeholder', 'CURP');
            $('#Persons_state_of_birth').css('display', '');
        } else {
            $('#Persons_curp_passport').attr('placeholder', 'Pasaporte');
            $('#Persons_state_of_birth').css('display', 'none');
        }
    });

    $('.cleanbutton').click(function() {
        $('.cleandiv').show();
    });
     $('.savebutton').click(function() {
        $('.successdiv').show();
    });
  
});