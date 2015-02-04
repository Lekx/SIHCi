$(document).ready(function () {
	// body...


$('.cbp-hssubmenu > li').hide();

$('.cbp-hsmenu > li').each(function () {
    $(this).click(function () {
        $('.cbp-hsmenu > li').not(this).find('li').slideUp();
        $(this).find('.cbp-hssubmenu li').slideDown();
        return false;
    });
});

});

