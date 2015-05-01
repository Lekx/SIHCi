$(document).ready(function() {
  $('input').attr('autocomplete', 'off');


 $('#Persons_curp_passport').tooltipster({ // <-  USE THE PROPER SELECTOR FOR YOUR INPUTs // default is 'hover' which is no good here
        onlyOne: false, // allow multiple tips to be open at a time
        position: 'right' // display the tips to the right of the element
    });

 
      if ($('#Persons_country').val() == 'Mexico') {
        $('#Persons_curp_passport').attr('placeholder', 'CURP');
        $('#Persons_curp_passport').tooltipster('content', 'CURP');
    } else {
        $('#Persons_curp_passport').attr("placeholder", "Pasaporte");
        $('#Persons_state_of_birth').css('display', 'none');
        $('#Persons_curp_passport').tooltipster('content', 'Pasaporte');
    }
    $('#Persons_country').on('change', function() {
        if ($('#Persons_country').val() == 'Mexico') {
            $('#Persons_curp_passport').attr('placeholder', 'CURP');
            $('#Persons_curp_passport').tooltipster('content', 'CURP');
        } else {
            $('#Persons_curp_passport').attr('placeholder', 'Pasaporte');
            $('#Persons_curp_passport').tooltipster('content', 'Pasaporte');
        }
    });

     var current_fs, next_fs, previous_fs; //fieldsets
     var left, opacity, scale; //fieldset properties which we will animate
     var animating; //flag to prevent quick multi-click glitches
     $(".nextform").click(function() {
        
         if (animating) return false;
         animating = true;
         current_fs = $(this).parent();
         next_fs = $(this).parent().next();
         //activate next step on progressbar using the index of next_fs
         $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
         //show the next fieldset
         next_fs.show();
         //hide the current fieldset with style
         current_fs.animate({
             opacity: 0
         }, {
             step: function(now, mx) {
                 //as the opacity of current_fs reduces to 0 - stored in "now"
                 //1. scale current_fs down to 80%
                 //2. bring next_fs from the right(50%)
                 left = (now * 0) + "%";
                 //3. increase opacity of next_fs to 1 as it moves in
                 opacity = 1 - now;
                 current_fs.css({
                     
                 });
                 next_fs.css({
                     'left': left,
                     'opacity': opacity
                 });
             },
             duration: 0,
             complete: function() {
                 current_fs.hide();
                 animating = false;
             },
             //this comes from the custom easing plugin
             easing: 'easeInOutBack'
         });
     });
     $(".previousform").click(function() {
         if (animating) return false;
         animating = true;
         current_fs = $(this).parent();
         previous_fs = $(this).parent().prev();
         //de-activate current step on progressbar
         $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
         //show the previous fieldset
         previous_fs.show();
         //hide the current fieldset with style
         current_fs.animate({
             opacity: 0
         }, {
             step: function(now, mx) {
                 //as the opacity of current_fs reduces to 0 - stored in "now"
                 //1. scale previous_fs from 80% to 100%
                             //2. take current_fs to the right(50%) - from 0%
                 left = ((1 - now) * 0) + "%";
                 //3. increase opacity of previous_fs to 1 as it moves in
                 opacity = 1 - now;
                 current_fs.css({
                     'left': left
                 });
                 previous_fs.css({
                     'transform': 'scale(' + scale + ')',
                     'opacity': opacity
                 });
             },
             duration: 0,
             complete: function() {
                 current_fs.hide();
                 animating = false;
             },
             //this comes from the custom easing plugin
             easing: 'easeInOutBack'
         });
     });
 });