$(document).ready(function() {
    $('.sub1,.sub2, .sub3, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    $('.sub,.sub1,.sub2, .sub3, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12, .12').next().remove();
    $('.menuitem').next().remove();
    $('.menuitem.1').hover(function() {
        $('.sub1').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.2').hover(function() {
        $('.sub2').show();
        $('.sub1, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub1, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.3').hover(function() {
        $('.sub3').show();
        $('.sub1, .sub2, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub1, .sub2, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.4').hover(function() {
        $('.sub4').show();
        $('.sub1, .sub2, .sub3, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub1, .sub3, .sub3, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.5').hover(function() {
        $('.sub5').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.6').hover(function() {
        $('.sub6').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub5, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub5, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.7').hover(function() {
        $('.sub7').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub5, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub5, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.8').hover(function() {
        $('.sub8').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub5, .sub9, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub5, .sub9, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.9').hover(function() {
        $('.sub9').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub10, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub10, .sub11, .sub12').hide();
    });
    $('.menuitem.10').hover(function() {
        $('.sub10').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub9, .sub11, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub0, .sub11, .sub12').hide();
    });
    $('.menuitem.11').hover(function() {
        $('.sub11').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub10, .sub9, .sub12').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub10, .sub9, .sub12').hide();
    });
    $('.12').hover(function() {
        $('.sub12').show();
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub10, .sub11, .sub9').hide();
    }, function() {
        $('.sub2, .sub3, .sub3, .sub4, .sub6, .sub7, .sub8, .sub5, .sub10, .sub9, .sub11').hide();
    }); /* Hide When Menu is not in hover */
    $('.cvmenuitems').hover(function() {}, function() {
        $('.sub1,.sub2, .sub3, .sub3, .sub4, .sub5, .sub6, .sub7, .sub8, .sub9, .sub10, .sub11, .sub12').hide();
    });
});