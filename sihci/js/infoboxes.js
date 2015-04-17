$(document).ready(function() {
    function checkFocus() {
        $('#Persons_names').focus(function() {
            $('#Persons_names').next().css('visibility', 'visible', 'display', 'inline-block');
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
        //Datos direccion Actual
        $('#Addresses_country').focus(function() {
            $('#Addresses_country').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_country').next().css('visibility', 'hidden');
        });
        $('#Addresses_zip_code').focus(function() {
            $('#Addresses_zip_code').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_zip_code').next().css('visibility', 'hidden');
        });
        $('#Addresses_state').focus(function() {
            $('#Addresses_state').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_state').next().css('visibility', 'hidden');
        });
        $('#Addresses_delegation').focus(function() {
            $('#Addresses_delegation').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_delegation').next().css('visibility', 'hidden');
        });
        $('#Addresses_city').focus(function() {
            $('#Addresses_city').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_city').next().css('visibility', 'hidden');
        });
        $('#Addresses_town').focus(function() {
            $('#Addresses_town').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_town').next().css('visibility', 'hidden');
        });
        $('#Addresses_colony').focus(function() {
            $('#Addresses_colony').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_colony').next().css('visibility', 'hidden');
        });
        $('#Addresses_street').focus(function() {
            $('#Addresses_street').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_street').next().css('visibility', 'hidden');
        });
        $('#Addresses_external_number').focus(function() {
            $('#Addresses_external_number').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_external_number').next().css('visibility', 'hidden');
        });
        $('#Addresses_internal_number').focus(function() {
            $('#Addresses_internal_number').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Addresses_internal_number').next().css('visibility', 'hidden');
        });
        //Datos jobs
        $('#Jobs_organization').focus(function() {
            $('#Jobs_organization').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_organization').next().css('visibility', 'hidden');
        });
        $('#Jobs_area').focus(function() {
            $('#Jobs_area').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_area').next().css('visibility', 'hidden');
        });
        $('#Jobs_title').focus(function() {
            $('#Jobs_title').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_title').next().css('visibility', 'hidden');
        });
        $('#Jobs_start_day').focus(function() {
            $('#Jobs_start_day').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_start_day').next().css('visibility', 'hidden');
        });
        $('#Jobs_start_month').focus(function() {
            $('#Jobs_start_month').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_start_month').next().css('visibility', 'hidden');
        });
        $('#Jobs_start_year').focus(function() {
            $('#Jobs_start_year').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_start_year').next().css('visibility', 'hidden');
        });
        $('#Jobs_hospital_unit').focus(function() {
            $('#Jobs_hospital_unit').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_hospital_unit').next().css('visibility', 'hidden');
        });
        $('#Jobs_rud').focus(function() {
            $('#Jobs_rud').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_rud').next().css('visibility', 'hidden');
        });
        $('#Jobs_schedule').focus(function() {
            $('#Jobs_schedule').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Jobs_schedule').next().css('visibility', 'hidden');
        });
        // Datos researchAreas
        $('#ResearchAreas_name').focus(function() {
            $('#ResearchAreas_name').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#ResearchAreas_name').next().css('visibility', 'hidden');
        });
        //Datos commission
        $('#Curriculum_SNI').focus(function() {
            $('#Curriculum_SNI').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Curriculum_SNI').next().css('visibility', 'hidden');
        });
        $('#Curriculum_researcher_title').focus(function() {
            $('#Curriculum_researcher_title').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Curriculum_researcher_title').next().css('visibility', 'hidden');
        });
        //Datos Grades
        $('#Grades_country').focus(function() {
            $('#Grades_country').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_country').next().css('visibility', 'hidden');
        });
        $('#Grades_grade').focus(function() {
            $('#Grades_grade').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_grade').next().css('visibility', 'hidden');
        });
        $('#Grades_writ_number').focus(function() {
            $('#Grades_writ_number').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_writ_number').next().css('visibility', 'hidden');
        });
        $('#Grades_title').focus(function() {
            $('#Grades_title').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_title').next().css('visibility', 'hidden');
        });
        $('#Grades_obtention_date').focus(function() {
            $('#Grades_obtention_date').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_obtention_date').next().css('visibility', 'hidden');
        });
        $('#Grades_status').focus(function() {
            $('#Grades_status').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_status').next().css('visibility', 'hidden');
        });
        $('#Grades_thesis_title').focus(function() {
            $('#Grades_thesis_title').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_thesis_title').next().css('visibility', 'hidden');
        });
        $('#Grades_state').focus(function() {
            $('#Grades_state').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_state').next().css('visibility', 'hidden');
        });
        $('#Grades_sector').focus(function() {
            $('#Grades_sector').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_sector').next().css('visibility', 'hidden');
        });
        $('#Grades_institution').focus(function() {
            $('#Grades_institution').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_institution').next().css('visibility', 'hidden');
        });
        $('#Grades_area').focus(function() {
            $('#Grades_area').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_area').next().css('visibility', 'hidden');
        });
         $('#Grades_discipline').focus(function() {
            $('#Grades_discipline').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_discipline').next().css('visibility', 'hidden');
        });
        $('#Grades_subdiscipline').focus(function() {
            $('#Grades_subdiscipline').next().css('visibility', 'visible', 'display', 'inline-block');
        }).focusout(function() {
            $('#Grades_subdiscipline').next().css('visibility', 'hidden');
        });
    }
    checkFocus();
});