 $(document).ready(function() {
     var searchKey = "";

      $("#searchbartop").keypress(function() {
         searchKey = $(this).val();
         if (searchKey.length > 1) {
             $.ajax({
                 url: yii.urls.searchbar + searchKey,
                 type: 'POST',
                        /*data: {
                        keyword: searchKey
                        },*/
                 success: function(data) {
                     $("#searchBarResultstop").show();
                     $('#searchBarResultstop').html(data);
                 },
             }).done({
                 //alert('Success!');
             }).fail({
                 //alert('fail :(');
             });
         }

      });

     $("#searchBarMain1").keypress(function() {
         searchKey = $(this).val();
         if (searchKey.length > 1) {
             $.ajax({
                 url: yii.urls.searchbar + searchKey,
                 type: 'POST',
                        /*data: {
                        keyword: searchKey
                        },*/
                 success: function(data) {
                     $("#searchBarResults").show();
                     $('#searchBarResults').html(data);
                 },
             }).done({
                 //alert('Success!');
             }).fail({
                 //alert('fail :(');
             });
         }
     });

     $("#searchBarMain1").focusout(function(){

         $("#searchBarResults").hide();
         $('#searchBarResults').html('');
         $('#searchBarMain1').val('');
     });

      $("#searchbartop").focusout(function(){

         $("#searchBarResultstop").hide();
         $('#searchBarResultstop').html('');
         $('#searchbartop').val('');
     });

     $("#search").click(function() {
         window.location = yii.urls.searchBarResults + searchKey;
     });

      $("#hsearchbutton").click(function() {
         window.location = yii.urls.searchBarResults + searchKey;
     });

 });