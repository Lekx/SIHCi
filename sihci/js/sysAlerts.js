$(document).ready(function() {
  $('.backbut').click(function() {
    window.location = yii.urls.back;
  });
  $('.errorbut').click(function() {

    $('.cleandiv').hide();
    $('.successdiv').hide();
    $('.errordiv').hide();
    $('.errordivuser').hide();
    $('.abortdiv').hide();

  });
  $('.summary').remove();
  $('.buttons a').click(function(e) {
    var url = $('.buttons a').attr('href');
    debugger
    $('.deleter').click(function() {
      window.location = url;
    });
    e.preventDefault();
    $('#myModal').modal('toggle');
    return false;
  });

  setInterval(function() {
    $(".notification").effect("highlight", {
      color: '#798B9D'
    }, 1000);
  }, 100);


  function backSuccesAlert(backurl) {
    window.location = yii.urls.createUrl + '/' + actionUrl

  }

});
