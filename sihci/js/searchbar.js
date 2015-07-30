$(document).ready(function() {

  window.onbeforeunload = function() {
    $(window).scrollTop(0);
  }


  var searchKey = "";

  $("#searchbartop").keyup(function() {
    searchKey = $(this).val();
    if (searchKey.length > 1) {
      $.ajax({
        url: yii.urls.searchbar + searchKey,
        type: 'POST',

        success: function(data) {
          $("#searchBarResultstop").show();
          $('#searchBarResultstop').html(data);
        },
      }).done({}).fail({

      });
      if (e.keyCode == 13)
        window.location = yii.urls.searchBarResults + searchKey;
    }

  });

  $("#searchBarMain1").keyup(function(e) {
    searchKey = $(this).val();
    if (searchKey.length > 1) {
      $.ajax({
        url: yii.urls.searchbar + searchKey,
        type: 'POST',

        success: function(data) {
          $("#searchBarResults").show();
          $('#searchBarResults').html(data);
        },
      }).done({}).fail({});
      if (e.keyCode == 13)
        window.location = yii.urls.searchBarResults + searchKey;
    }
  });
  $(document).click(function(e) {
    var target = e.target;

    if (!$(target).is('#searchBarResults') && !$(target).parents().is('#searchBarResults')) {
      $('#searchBarResults').hide();
    }
  });

  $(document).click(function(e) {
    var target = e.target;

    if (!$(target).is('#searchBarResultstop') && !$(target).parents().is(
        '#searchBarResultstop')) {
      $('#searchBarResultstop').hide();
    }
  });



  $("#search").click(function() {
    $search = $("#search").val();
    if($search != "")
    window.location = yii.urls.searchBarResults + searchKey;
  });

  $("#hsearchbutton").click(function() {
    window.location = yii.urls.searchBarResults + searchKey;
  });

});
