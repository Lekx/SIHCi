    
    $(document).ready(function(){
         var validateEmail = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
         var validateNum = /^[0-9]+$/;
        /////FORM GRADES
            $("#btnCreateGrade").click(function(){

             	var grade = $("#grade").val(); 
                var writNumber = $("#writNumber").val();
             	var title = $("#title").val(); 
             	var obtentionDate = $("#obtentionDate").val(); 
             	var thesisTitle = $("#thesisTitle").val();
             	var institution = $("#institution").val(); 

                if(grade == ""){
                    $("#errorGrade").fadeIn("slow");
                    return false;
                }else{

                    $("#errorGrade").fadeOut();
                    if (writNumber == "" || !validateNum.test(writNumber)) {
                          $("#errorNumber").fadeIn("slow");
                          return false;
                    }else{
                        
                        $("#errorNumber").fadeOut();
                        if (title == "") {
                            $("#errorTitle").fadeIn("slow");
                            return false;
                        }else{
                             $("#errorTitle").fadeOut();
                             if (obtentionDate == "") {
                               $("#errorObtentionDate").fadeIn("slow");
                               return false;
                              }else{
                                 $("#errorObtentionDate").fadeOut();
                                if (thesisTitle == "") {
                                        $("#errorThesisTitle").fadeIn("slow");
                                        return false;
                                }else{
                                     $("#errorThesisTitle").fadeOut();
                                    if (institution == "") {
                                         $("#errorInstitution").fadeIn("slow");
                                         return false;
                                    }else{
                                         $("#errorInstitution").fadeOut();
                                    }
                                }
                            }
                        }
                    }
                    
                 }
 
            });//click

           $("#showFormGrade").on( "click", function() {
                $('.grades').show(); 
                $('#hideFormGrade').show();
                 $('#showFormGrade').hide();
             });
            $("#hideFormGrade").on( "click", function() {
                $('.grades').hide(); 
                  $('#showFormGrade').show();
            });


///FORM PHONES
   
             //Emails
            $("#btnCreateEmail").click(function(){
                
                var type = $("#typeEmail").val();
                var mail = $("#mail").val();
 
             
                if(type == ""){
                    $("#errorTypeEmail").fadeIn("slow");
                    return false;
                }else{
                    $("#errorTypeEmail").fadeOut();

                    if(mail == "" || !validateEmail.test(mail)){
                        $("#errorMail").fadeIn("slow");
                        return false;
                    }
                    else{
                        $("#errorMail").fadeOut();
                    }
                }
 
            });//click

             $("#showFormEmail").on( "click", function() {
                $('.emails').show(); 
                $('#hideFormEmail').show();
                $('#showFormEmail').hide();
             });
            $("#hideFormEmail").on( "click", function() {
                $('.emails').hide(); 
                $('#showFormEmail').show();
            });

            //Phoenes
                 $("#btnCreatePhone").click(function(){
                
                var typePhone = $("#typePhone").val();
                var countryCode = $("#countryCode").val();
                var localCode = $('#localCode').val();
                var phoneNum = $('#phoneNum').val();
 
             
                if(typePhone == ""){
                    $("#errorTypePhone").fadeIn("slow");
                    return false;
                }else{
                    $("#errorTypePhone").fadeOut();

                    if(countryCode == "" || !validateNum.test(countryCode)){
                        $("#errorCountry").fadeIn("slow");
                        return false;
                    }else{
                        $("#errorCountry").fadeOut();
                        if (localCode == "" || !validateNum.test(localCode)) {
                            $('#errorLocal').fadeIn("slow");
                            return false;
                        }else{
                            $('#errorLocal').fadeOut();
                            if (phoneNum == "" || !validateNum.test(phoneNum)) {
                                $('#errorPhone').fadeIn("slow");
                                return false;
                            }else{
                                $('#errorPhone').fadeOut();
                            }
                        }
                    }
                }
 
            });//click
             $("#showFormPhone").on( "click", function() {
                $('.phone').show(); 
                $('#hideFormPhone').show();
                $('#showFormPhone').hide();
             });
            $("#hideFormPhone").on( "click", function() {
                $('.phone').hide(); 
                $('#showFormPhone').show();
            });
    
        ///// FORM JOBS
                $('#rud').show(); 
                 $('#organization').show(); 
                $('#unitHospital').change(function(){

                    if($('#unitHospital').val() == 'NA') {
                        $('#rud').hide(); 
                    } else {
                        $('#rud').show(); 
                    } 
                     if($('#unitHospital').val() != 'NA') {
                           $('#organization').hide();             
                    } else {
                        $('#organization').show(); 
                    } 
                });
            /////////// FORM RESEARCH
            
             $("#btnCreateResearch").click(function(){
                
                var research = $("#research").val(); 
             
                if(research == ""){
                    $("#errorResearch").fadeIn("slow");
                    return false;
                }else{
                    $("#errorResearch").fadeOut();
                 }
 
            });//click
            $("#showFormResearch").on( "click", function() {
                $('.research').show(); 
                $('#hideFormResearch').show();
                $('#showFormResearch').hide();
             });
            $("#hideFormResearch").on( "click", function() {
                $('.research').hide(); 
                $('#showFormResearch').show();
            });
         

          
    });//ready