$(document).ready(function() {

$("#LogInUsers").click(function(){
location.reload();
});



    $('input').attr('autocomplete','off');
    var $submit = $(".nextform.action-button.1"),
        $inputs = $('#Persons_names, #Persons_last_name1, #Persons_last_name2');
/*
    function checkEmpty() {
        return $inputs.filter(function() {
            return !$.trim(this.value);
        }).length === 0;
    }
    $inputs.on('blur', function() {
      
        $submit.prop("disabled", !checkEmpty());
    }).blur();
    var $submit2 = $(".nextform.action-button.2"),
        $inputs2 = $('#Persons_country, #Persons_curp_passport');

    function checkEmpty2() {
        return $inputs2.filter(function() {
            return !$.trim(this.value);
        }).length === 0;
    }
    $inputs2.on('blur', function() {
        $submit2.prop("disabled", !checkEmpty2());
    }).blur();

    var $submit3 = $(".nextform.action-button.3"),
        $inputs3 = $('#Users_email, #Users_email2, #Users_password, #Users_password2');

 
    $(".nextform").hover(function(){

        $('.nextform').focus();

    });
*/
if($("input[name*='country']").val() == 'MX' ){
     $('#Persons_curp_passport').prop("placeholder", "CURP");
 }else{
    $('#Persons_curp_passport').prop("placeholder", "Pasaporte");

 }


$('.nextform.action-button.1').prop("disabled", true); 

   $('#Persons_names, #Persons_last_name1, #Persons_last_name2').keyup(function() {
    if($('#Persons_names').val() != "" && $('#Persons_last_name1').val() != "" &&  $('#Persons_last_name2').val() != "" ) {
         $('.nextform.action-button.1').prop("disabled", false);
    } else {
        $('.nextform.action-button.1').prop("disabled", true); 
    }


});

    $('.nextform.action-button.2').prop("disabled", true); 

    $('#Persons_country , #Persons_curp_passport').keyup(function() {

    if($('#Persons_curp_passport').val() != "" && $('#Persons_country').val() != "") {
         $('.nextform.action-button.2').prop("disabled", false);
    } else {
        $('.nextform.action-button.2').prop("disabled", true); 
    }
});

    function checkFocusInInputs() {
        //fieldset 1
        $("#Persons_names").focus(function() {
            $(".infoboxes.name").css("visibility", "visible");
        });
        $("#Persons_last_name1").focus(function() {
            $(".infoboxes.lastname").css("visibility", "visible");
        });
        $("#Persons_last_name2").focus(function() {
            $(".infoboxes.lastname2").css("visibility", "visible");
        });
        //fieldset 2
        $("#Persons_country").focus(function() {
            $(".infoboxes.country").css("visibility", "visible");
        });
        $("#Persons_curp_passport").focus(function() {
            $(".infoboxes.curp").css("visibility", "visible");
        });
        //fieldset 3
        $("#Users_email").focus(function() {
            $(".infoboxes.email").css("visibility", "visible");
        });
        $("#Users_email2").focus(function() {
            $(".infoboxes.email2").css("visibility", "visible");
        });
        $("#Users_password").focus(function() {
            $(".infoboxes.pass").css("visibility", "visible");
        });
        $("#Users_password2").focus(function() {
            $(".infoboxes.pass2").css("visibility", "visible");
        });
    }

    function checkFocusOutInputs() {
        //fieldset 1
        $("#Persons_names").focusout(function() {
            $(".infoboxes.name").css("visibility", "hidden");
        });
        $("#Persons_last_name1").focusout(function() {
            $(".infoboxes.lastname").css("visibility", "hidden");
        });
        $("#Persons_last_name2").focusout(function() {
            $(".infoboxes.lastname2").css("visibility", "hidden");
        });
        //fieldset 2
        $("#Persons_country").focusout(function() {
            $(".infoboxes.country").css("visibility", "hidden");
        });
        $("#Persons_curp_passport").focusout(function() {
            $(".infoboxes.curp").css("visibility", "hidden");
        });
        //fieldset 3
        $("#Users_email").focusout(function() {
            $(".infoboxes.email").css("visibility", "hidden");
        });
        $("#Users_email2").focusout(function() {
            $(".infoboxes.email2").css("visibility", "hidden");
        });
        $("#Users_password").focusout(function() {
            $(".infoboxes.pass").css("visibility", "hidden");
        });
        $("#Users_password2").focusout(function() {
            $(".infoboxes.pass2").css("visibility", "hidden");
        });
    }
    checkFocusInInputs();
    checkFocusOutInputs();
});