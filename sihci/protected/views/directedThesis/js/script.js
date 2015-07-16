function send()
{

    var fd = new FormData();
    var data=$("#directed-thesis-form").serialize();
    fd.append("DirectedThesis[path]",$('#path')[0].files[0]);

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
                    $("#directed-thesis-form")[0].reset();
                   // localtion.href='DirectedThesis/admin';                
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
