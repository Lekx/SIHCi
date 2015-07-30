 function send(form, actionUrl, id, redirectUrl, extras, extraCall) {
$(".errorh2 span").html("Corrija el error y favor de intentar de nuevo.");

if(extras == "checkAuths")
  checkAuths(form);


   $('.tooltipster-base').hide();
   var formData;
   if (form != '')
     formData = new FormData($("#" + form)[0]);
   else
     formData = new FormData();

   if (extras != '') {
     var temp = new Array();
     temp = extras.split(",");
     for (a in temp) {
       formData.append(parseInt(a) + 1, temp[a]);
     }
   }

   $.ajax({
     url: yii.urls.createUrl + "/" + actionUrl + "/" + id,
     type: 'POST',
     data: formData,
     datatype: 'json',
     async: false,
     beforeSend: function() {
       $('.loader').show();
     },
     success: function(response) {
       var data = JSON.parse(response);
       if (data['status'] != 'success') {
         if (("message" in data)) {
           $(".errorh2 h2").html(data['message']);
           $(".errorh2 span").html(data['subMessage']);
         }
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
         $('.tooltipster-base').hide();
         $(".successdiv").show();

         if (typeof extraCall != 'undefined') {
           var ids = extraCall.split(",");
          // alert(ids[0] + " " + ids[1] + " ");
           $("#" + ids[0]).hide();
           $("#" + ids[1]).show();
         }

         $('.backbut').unbind().click(function() {
           if (redirectUrl != "none")
             window.location = yii.urls.createUrl + "/" + redirectUrl;
           else
             $(".successdiv").hide();

         });

       }
     },
     complete: function(data) {
       $('.loader').hide();
     },
     error: function(data) {
       $('.loader').hide();
     },
     cache: false,
     contentType: false,
     processData: false
   });
   return false;

 }

function capitalise(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}

 function checkAuths(formid){

  var realForm = formid;
  var formid = capitalise(formid.split("-")[0]);
  if(formid == "Articles")
    formid = "ArtGuidesAuthor";
  else if(realForm == "books-chapters-form")
    formid = "BooksChaptersAuthors";
  else
    formid = formid+"Authors";

    var names = $("#names").val();
    var ln1 = $("#last_names1").val();
    var ln2 = $("#last_names2").val();
    var pos = $("#positions").val();
    
    if(names == "") {
      $("#"+formid+"_names_em_").html("nombre(s) no puede ser nulo.");
      $("#"+formid+"_names_em_:first").show();
    }
   if(ln1 == ""){
    $("#"+formid+"_last_name1_em_").html("Apellido paterno no puede ser nulo.");
      $("#"+formid+"_last_name1_em_:first").show();
   }
    if(ln2 == ""){
      $("#"+formid+"_last_name2_em_").html("Apellido materno no puede ser nulo.");
      $("#"+formid+"_last_name2_em_:first").show();

    }
    if(pos == ""){
      $("#"+formid+"_position_em_").html("Posición del autor no puede ser nulo.");
      $("#"+formid+"_position_em_:first").show();
  
    }
          
 


 }
