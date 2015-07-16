$(document).ready(function () {

	$('#logocuentas4').on({
    'mouseenter':function(){
        $('.notificationsys').show();
    },'mouseleave':function(){
     $('.notificationsys').hide(); 
    }
});
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
     $('#searchBarResults').hide();
        $('.cbp-hssubmenu1 > li').hide();
        $(".slidingDiv").slideDown();
        return false;
    });

});


$(document).ready(function () {
    // body...
$('.cbp-hssubmenu1 > li').hide();

 $(".slidingDiv2").hover(function () {
        $(this).find('.cbp-hsmenu1 li').slideDown();
        return false;
    });

 $('.slidingDiv2').mouseleave(function () {
        $('.slidingDiv2').slideUp();
        return false;
    });
     
});

$(document).ready(function () {

 $('#show_hidemenu2').click(function(){

        $('.cbp-hssubmenu1 > li').hide();
        $(".slidingDiv2").slideDown();
        return false;
    });

});