function send(form, actionUrl, id) {
  var formData = new FormData($("#" + form)[0]);
  debugger
  $.ajax({
    url: yii.urls.createUrl + "/" + actionUrl + "/" + id,
    type: 'POST',
    data: formData,
    datatype: 'json',
    async: false,
    beforeSend: function() {},
    success: function(response) {
      var data = JSON.parse(response);
      if (data['status'] != 'success') {

        $(".errordiv").show();
        for (var key in data) {
          $("#" + key + "_em_").show();
          $("#" + key + "_em_").html(data[key]);
        }
      } else {
        if (("message" in data)) {
          $(".successh2 h2").html(data['message']);
          $(".successh2 span").html(data['subMessage']);
        }
        $(".error").hide();
        $(".errorMessage").hide();
        $(".successdiv").show();
      }
    },
    complete: function(data) {},
    error: function(data) {},
    cache: false,
    contentType: false,
    processData: false
  });

  return false;
}
