$(window).load(function(){

      $("#slider4").responsiveSlides({
        pager: false,
        nav: true,
        speed: 1100,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

});