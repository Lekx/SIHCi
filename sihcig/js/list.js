$(document).ready(function () {
	// body...
$('.cbp-hssubmenu1 > li').hide();

 $(".slidingDiv").hover(function () {
        $(this).find('.cbp-hsmenu1 li').slideDown();
        return false;
    });

 $('.slidingDiv').mouseleave(function () {
        $('.slidingDiv').slideUp();
        return false;
    });
     
});

$(document).ready(function () {

 $('#show_hidemenu').click(function(){

        $('.cbp-hssubmenu1 > li').hide();
        $(".slidingDiv").slideToggle();
        return false;
    });

});



 
    









