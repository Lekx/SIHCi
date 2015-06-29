function send()
{

    var fd = new FormData();
    var data=$("#software-form").serialize();
    fd.append("Sooftware[patt]",$('#path')[0].files[0]);

    $.ajax({
        url: 'create',
        type: 'POST',
        cache: false,
        data: fd,
        processData: false,
        contentType: false,
        success: function (data)
        {
            if(data.status=="200"){
                    alert("Registro realizado con éxito");
                    $("#articles-guides-form")[0].reset();
            }
            else
            {
                alert(data);
            }

        },
     /*   error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");
        }*/
    });
}

function upDate()
{

    var fd = new FormData();
    var data=$("#software-form").serialize();
    fd.append("Sooftware[patt]",$('#path')[0].files[0]);

    $.ajax({
        url: 'update',
        type: 'POST',
        cache: false,
        data: fd,
        processData: false,
        contentType: false,
        success: function (data)
        {
            if(data.status=="200"){
                    alert("Registro realizado con éxito");
                    $("#articles-guides-form")[0].reset();
            }
            /*else
            {
                alert(data);
            } */

        },
       /*error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");
        }*/
    });
}
