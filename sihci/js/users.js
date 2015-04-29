$(document).ready(function() {
    $("#LogInUsers").click(function() {
        location.reload();
    });

    if ($('#Persons_country').val() == 'Mexico') {
        $('#curp').css('display', 'block;');
     
    } else {
       $('#curp').css('display', 'block;');
    }

    $('#Persons_country').on('change', function() {
        if ($('#Persons_country').val() == 'Mexico') {
            $('#pasaporte').css('display', 'none');
            $('#curp').css('display', 'block;');
        } else {
            $('#pasaporte').css('display', 'block;');
              $('#curp').css('display', 'none;');
        }
    });

    $('input').attr('autocomplete', 'off');
    var $submit = $(".nextform.action-button.1"),
        $inputs = $('#Persons_names, #Persons_last_name1, #Persons_last_name2');
    if ($("input[name*='country']").val() == 'MX') {
        $('#Persons_curp_passport').prop("placeholder", "CURP");
    } else {
        $('#Persons_curp_passport').prop("placeholder", "Pasaporte");
    }
    $('.nextform.action-button.1').prop("disabled", true);
    $('#Persons_names, #Persons_last_name1, #Persons_last_name2').keyup(function() {
        if ($('#Persons_names').val() != "" && $('#Persons_last_name1').val() != "" && $('#Persons_last_name2').val() != "") {
            $('.nextform.action-button.1').prop("disabled", false);
        } else {
            $('.nextform.action-button.1').prop("disabled", true);
        }
    });
    $('.nextform.action-button.2').prop("disabled", true);
    $('#Persons_country , #Persons_curp_passport').keyup(function() {
        if ($('#Persons_curp_passport').val() != "" && $('#Persons_country').val() != "") {
            $('.nextform.action-button.2').prop("disabled", false);
        } else {
            $('.nextform.action-button.2').prop("disabled", true);
        }
    });
});