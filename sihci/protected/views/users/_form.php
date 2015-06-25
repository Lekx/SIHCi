<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<script>
$(document).ready(function() {
    $(".numericOnly").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            (e.keyCode == 65 && e.ctrlKey === true) ||
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
        }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    $('#Persons_curp_passport').keyup(function() {
    var raw_text =  $(this).val();
    var return_text = raw_text.replace(/[^a-zA-Z0-9 _]/g,'');
    $(this).val(return_text);
});

    if($("#sponsorsBillingCheck").is(":checked"))
        $("#sponsorsBillingForm").hide();

    $("#sponsorsBillingCheck").click(function(){
       $("#sponsorsBillingForm").toggle();
    });
});

function lettersOnly(e){
     key = e.keyCode || e.which;
     tecla = String.fromCharCode(key).toLowerCase();
     letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
     especiales = [8,37,39,46,45,47];

     tecla_especial = false
    for(var i in especiales){
     if(key == especiales[i]){
            tecla_especial = true;
    break;
            } 
 }
 
        if(letras.indexOf(tecla)==-1 && !tecla_especial)
     return false;
     }


    
</script>





<div id="crateusers" class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'users-form',
    'enableAjaxValidation'=>true,
    'action'=>$this->createUrl('users/create'),
    'enableClientValidation'=>true,
));?>

    <div class="progreesbar">
        <ul id="progressbar">
            <li class="active"><img id=""src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/usuariocirculo.png" alt=""> </li>
            <li><img id=""src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/mundocirculo.png" alt="">  </li>
            <li><img id=""src="<?php echo Yii::app()->request->baseUrl;?>/img/icons/candadocirculo.png" alt="">  </li>
        </ul>
    </div>
    <fieldset>
        <?php echo $form->errorSummary($modelPersons);?>
          <?php echo $form->errorSummary($model);?>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo $form->textField($modelPersons, 'names', array('placeholder' => "Nombre(s).", 'title'=>'Ingresa tu nombre','onKeypress'=>'return lettersOnly(event)'));?>
            </div>
        </div>

        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo $form->textField($modelPersons, 'last_name1', array('placeholder' => "Apellido Paterno",'title'=>'Ingresa tu Apellido Paterno','onKeypress'=>'return lettersOnly(event)'));?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo $form->textField($modelPersons, 'last_name2', array('placeholder' => "Apelido Materno" ,'title'=>'Ingresa tu Apellido Materno','onKeypress'=>'return lettersOnly(event)'));?>
            </div>
        </div>
        <input type="button" name="nextform" class="nextform action-button 1" value="Listo.." />
    </fieldset>

   <fieldset>
        <div class="emptycontent"></div>
        <div class="row">

        <?php $this->widget('ext.CountrySelectorWidget', array(

        'value' =>  'Persons_country',
        'name' => 'Persons[country]',
        'id' =>  'Persons_country',
        'useCountryCode' => false,
        'defaultValue' => 'Mexico',
        'firstEmpty' => true,
        'firstText' => 'Pais',

        )); ?>

          <?php echo $form->error($model,'country'); ?>
         
        </div>
        <div class="emptycontent"></div>
        <div class="row">


            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-globe"></i>
                <?php echo $form->textField($modelPersons, 'curp_passport', array('placeholder' => "CURP / Pasaporte", 'title'=>'CURP / Pasaporte' ));?>
            </div>
           </div> 
        <div class="emptycontent"></div>
        <input type="button" name="previousform" class="previousform action-button" value="Regresar.." />
        <input type="button" name="nextform" class="nextform action-button 2" value="Listo.." />
    </fieldset> 

    <fieldset id="preregisterForm">
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <?php echo $form->textField($model, 'email', array('placeholder' => "Email", 'title'=>'Ingresa tu dirección de email'));?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input type="text" title="Confirma tu dirección de email" name="Users[email2]" id="Users_email2" placeholder="Verificación de Email" maxlength="100" ></input>
            </div>

        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <?php echo $form->passwordField($model, 'password', array('placeholder' => "Contraseña",'title'=>'Ingresa tu Contraseña'));?>
            </div>
              
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" title="Confirma tu Contraseña" name="Users[password2]" id="Users_password2" placeholder="Verificación de Contraseña" maxlength="12"></input>
            </div>
       
             
        </div>

        <input type="hidden" name="Users[registration_date]" id="Users_registration_date" value="0000-00-00 00:00:00">
        <input type="hidden" name="Users[activation_date]" id="activation_registration_date" value="0000-00-00 00:00:00">
        <input type="hidden" name="Users[act_react_key]" id="Users_act_react_key" value="0000-00-00 00:00:00">


        <input type="button" name="previousform" class="previousform action-button" value="Regresar.." />

        <div class="row buttons">

             <?php echo CHtml::ajaxButton('Generar Registro', CController::createUrl('users/create'),
                 array(
                    'type'=>'POST',
                    'data'=> 'js:$("#users-form").serialize()+ "&ajax=users-form"',
                    'success'=>'function(response) { 
                        if(response == "202"){ 
                            $("#preregisterForm").hide();
                            $("#SuccesSignin").show();
                        
                    }else
                       $(".errordivuser").show();
                    }',                    
                     'beforeSend'=>'function(){                        
                           $("#AjaxLoader").show();
                      }'
                     )); ?>
         </div>            
            
        </fieldset>
        <fieldset id="SuccesSignin">
            
            <h1 id="RegistroSus">¡Registro Exitoso!</h1>
           
            <hr id="resgistrohr">
        <p>Se ha enviado un correo electrónico a su dirección, por favor siga las indicaciones ahi descritas para activar su cuenta.</p>
             <input type="button" id="LogInUsers" name="" class="indexbut action-button 4" value="Regresar al sitio" />

        </fieldset>
        <div class="countusers">
            Gracias a ti ahora somos:<br>
            <h2>2,456</h2>
        </div>
        <?php $this->endWidget();?>

         <div class="closecreate">
            No deseo Ingresar <i class="glyphicon glyphicon-remove"></i>
        </div>
        </div><!-- form -->