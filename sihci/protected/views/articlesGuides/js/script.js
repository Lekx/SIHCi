function send()
{
    var fd = new FormData($("#articles-guides-form")[0]);
    var data=$("#articles-guides-form").serialize();
    fd.append("ArticlesGuides[url_document]",$('#url_document')[0].files[0]);

   

    $.ajax({
        url: 'create',
        type: 'POST',
        cache: false,
        data: fd,
        success: function (data)
        {            
            if(data.status=="success")
            {                         
                    alert("Registro realizado con éxito");
                    $("#articles-guides-form")[0].reset();                
            }
            else
            {
                alert(data);
            } 

        },
        processData: false,
        contentType: false,
     /*   error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");   
        }*/
    });
}

function upDate()
{

    var fd = new FormData();
    var data=$("#articles-guides-form").serialize();
    fd.append("ArticlesGuides[url_document]",$('#url_document')[0].files[0]);

    $.ajax({
        url: 'upadte'
        type: 'POST',
        cache: false,
        data: fd,
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
        processData: false,
        contentType: false,
       /*error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");   
        }*/
    });
}
