$(document).ready(function() {
  $('input[type=file]').each(function() {
    var id = $(this).attr('id'),
      name = $(this).attr('name'),
      button = $('<button type="button" ' + 'class="filepicker" ' + 'id="btn' + id + '" ' +
        'name="btn' + name + '">' + '<i class="fa fa-upload"></i> Seleccionar ' + $(this).attr(
          'title') + '</button>');
    var filetype = $(this).attr('title')
    button.on('click', function(e) {
      e.preventDefault();
      //var id = $(this).attr('id'), name = $(this).attr('name');
      $('#' + id).remove();
      input = $('<input style="display:none" type="file" ' + 'id="' + id + '" ' +
        'name="' + name + '">');
      input.on('change', function() {
        //  alert("me picaste");
        $(this).prev().html('<i class="fa fa-upload"></i> ' + this.value.replace(
          /.*fakepath./, '')).addClass('selected');
        var url = input.val();
        if (url.length == 0) {
          console.log("Vacio");
        } else {
          button.after('<button type="" class="deleteval"></button>');
          $('.deleteval').click(function() {
            $(this).prev().html('<i class="fa fa-upload"></i> Seleccionar ' +
              filetype + this.value.replace(
                /.*fakepath./, '')).addClass('selected');
            var val = input.val();
            input.val('');
            this.remove();
          });
        }
      });
      $(this).after(input);
      input.trigger('click');
      return false;
    });
    $(this).after(button).remove();

  });

});
