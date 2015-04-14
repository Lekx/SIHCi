$(document).ready(function(){

    var interval = setInterval(function(){
        cycle();
    },5000);

    var ss = $('.slideshow');
    var first_img = ss.find('.img-block').first();
    var last_img = ss.find('.img-block').last();

    function cycle() {
        var next_img = ss.find('.on').removeClass('on').next();
        if(next_img.length==0) {
            next_img = first_img;
        }
        next_img.addClass('on');
    }

});

