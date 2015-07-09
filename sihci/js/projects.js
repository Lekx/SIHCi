$(document).ready(function() {

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



});
