$(document).ready( function() {
    $('input[type=file]').each(function(){
        var id = $(this).attr('id'),
            name = $(this).attr('name'),
  		button = $('<button type="button" '
                +'class="filepicker" '
                +'id="'+id+'" '
                +'name="'+name+'">'
                +'<i class="fa fa-upload"></i> Seleccionar '
                +$(this).attr('title')
            +'</button>');
			
		button.on('click',function(e){
				e.preventDefault();
				var id = $(this).attr('id'), name = $(this).attr('name');
				input = $('<input style="display:none" type="file" '+'id="'+id+'" '+'name="'+name+'">');
      	input.on('change',function(){
          $(this).prev().html('<i class="fa fa-upload"></i> '+this.value.replace(/.*fakepath./,'')).addClass('selected');
        });
				$(this).after(input);
				input.trigger('click');
				return false;
			});
        $(this).after(button).remove();
    });
});