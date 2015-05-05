function send()
{

    var fd = new FormData();
    var data=$("#software-form").serialize();
    fd.append("Software[path]",$('#path')[0].files[0]);

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
                    $("#software-form")[0].reset();                
            }
            /*else
            {
                alert(data);
            } */   

        },
     /*   error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");   
        }*/
    });
}
