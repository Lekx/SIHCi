var lastScrollTop = 0;
$(window).scroll(function(event){
   var scroll = $(this).scrollTop();

   if ($(window).scrollTop() == 0)
   {
   	 $('#header-content-container').fadeOut("slow");
   }

   if (scroll > 200 ){
      $('#header-content-container').show();
   }

   lastScrollTop = scroll;
});
