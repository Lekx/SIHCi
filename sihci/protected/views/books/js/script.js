function send()
{

    var fd = new FormData();
    //var data=$("#books-form").serialize();
    //var element =document.getElementById("Books_path");
    fd.append("Books[path]", $(element)[0].files[0]);
    
    $.ajax({
        url: 'create',
        type: 'POST',
        cache: false,
        data: fd,
        dataType: "JSON"
        processData: false,
        contentType: false,
        success: function (data)
        {            
            if(data.status=="200"){                         
                    alert("Registro realizado con éxito");
                    //alert(JSON.stringify("Registro realizado con éxito"
                    //$("#books-form")[0].reset();                
            }
            else
               alert(data);
            

        },
     /*   error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");   
        }*/
    });
}

function update()
{   
    var fd = new FormData();
    var data=$("#books-form").serialize();
    fd.append("Books[path]",$('#path')[0].files[0]);

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
                    $("#books-form")[0].reset();                
            }
            /*else
               alert(data);*/
             

        },
     /*   error: function () {
            alert("Ha ocurrido un error al guardar sus datos en el servidor. Por favor vuelva intente en unos minitus asegurese que este conectado a internet");   
        }*/
    });
}
