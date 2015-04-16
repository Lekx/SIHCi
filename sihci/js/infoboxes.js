$(document).ready(function() {
    function checkFocus() {
        $('#Persons_names').focus(function() {
            $('#Persons_names').next().css('visibility', 'visible', 'display','inline-block');
        }).focusout(function() {
            $('#Persons_names').next().css('visibility', 'hidden');
        });
        $('#Persons_last_name1').focus(function() {
            $('#Persons_last_name1').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_last_name1').next().css('visibility', 'hidden');
        });
        $('#Persons_last_name2').focus(function() {
            $('#Persons_last_name2').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_last_name2').next().css('visibility', 'hidden');
        });
        $('#Persons_marital_status').focus(function() {
            $('#Persons_marital_status').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_marital_status').next().css('visibility', 'hidden');
        });
        $('#Persons_birth_date').focus(function() {
            $('#Persons_birth_date').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_birth_date').next().css('visibility', 'hidden');
        });
        $('#Persons_genre').focus(function() {
            $('#Persons_genre').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_genre').next().css('visibility', 'hidden');
        });
        $('#Persons_country').focus(function() {
            $('#Persons_country').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_country').next().css('visibility', 'hidden');
        });
        $('#Curriculum_native_country').focus(function() {
            $('#Curriculum_native_country').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Curriculum_native_country').next().css('visibility', 'hidden');
        });
        $('#Persons_state_of_birth').focus(function() {
            $('#Persons_state_of_birth').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_state_of_birth').next().css('visibility', 'hidden');
        });
        $('#Persons_curp_passport').focus(function() {
            $('#Persons_curp_passport').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_curp_passport').next().css('visibility', 'hidden');
        });
        $('#Persons_photo_url').focus(function() {
            $('#Persons_photo_url').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_photo_url').next().css('visibility', 'hidden');
        });
        $('#Persons_person_rfc').focus(function() {
            $('#Persons_person_rfc').next().css('visibility', 'visible');
        }).focusout(function() {
            $('#Persons_person_rfc').next().css('visibility', 'hidden');
        });
    }
    checkFocus();
});