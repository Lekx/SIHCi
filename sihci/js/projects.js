$(document).ready(function() {

  var owl = $("#owl-demo");

  owl.owlCarousel({
    items: 6,
    autoWidth: true,
  });

  // Custom Navigation Events
  $(".next").click(function() {
    owl.trigger('owl.next');
  })
  $(".prev").click(function() {
    owl.trigger('owl.prev');
  })
  $(".play").click(function() {
    owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
  })
  $(".stop").click(function() {
    owl.trigger('owl.stop');
  })

  var currentPage = $('.paggersection li.active').text();
  if (currentPage == "1") {
    $('.fa-arrow-left').hide();
  }

  $('.paggersection li').click(function() {
    $('.active').removeClass('active');
    $(this).toggleClass('active');

    $('.fa-arrow-left').show();
    $('.fa-arrow-right').show();

    var currentPage = $('.paggersection li.active').text();
    if (currentPage == "1") {
      $('.fa-arrow-left').hide();
    } else if (currentPage == "5") {
      $('.fa-arrow-right').hide();
    }

    for (var i = 0; i < 6; i++) {
      var valor = $('.page' + i).text();
      $('.projects' + valor).hide();
    }
    var valor = $('.paggersection li.active').text();
    $('.projects' + valor).show();
  });
  $('.fa-arrow-right').click(function() {
    $('.fa-arrow-left').show();
    var currentPage = $('.paggersection li.active').text()
    if (currentPage == "5") {
      $('.fa-arrow-right').hide();
      return 0;
    }
    $('.paggersection li.active').removeClass('active').next().addClass('active');
    var nextPage = parseInt(currentPage);
    $('.projects' + nextPage).hide();
    nextPage++;
    $('.projects' + nextPage).show();
  });

  $('.fa-arrow-left').click(function() {
    $('.fa-arrow-left').show();
    var currentPage = $('.paggersection li.active').text();
    if (currentPage == "1") {
      $('.fa-arrow-left').hide();
      return 0;
    }
    $('.paggersection li.active').removeClass('active').prev().addClass('active');
    var nextPage = parseInt(currentPage);
    $('.projects' + nextPage).hide();
    nextPage--;
    $('.projects' + nextPage).show();

  });

  $('.savepro').click(function() {
    $('#projectsModal').modal('toggle');
  });
  $('.sendpro').click(function() {
    $('#projectsModal').modal('toggle');
  });

});
