function send()
{
    var fd = new FormData();
    var data=$("#sponsors-form").serialize();
    fd.append("Persons[photo_url]",$('#photo_url')[0].files[0]);

    $.ajax({
        url: 'SponsorsInfo',
        type: 'POST',
        cache: false,
        data: fd,
        processData: false,
        contentType: false,
        success: function (data)
        {
                    if(data.status=="200"){
                    alert("Registro realizado con éxito");
                    $("#sponsors-form")[0].reset();
            }
        },

    });
}
