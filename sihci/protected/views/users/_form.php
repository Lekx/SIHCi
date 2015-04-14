<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

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
                <?php echo $form->textField($modelPersons, 'names', array('placeholder' => "Nombre(s)."));?>
            </div>
            <div class="infoboxes name">

               <?php echo "<span>Ingresa tu nombre.</span>".$form->error($modelPersons,'names'); ?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo $form->textField($modelPersons, 'last_name1', array('placeholder' => "Apellido Paterno"));?>
            </div>
             <div class="infoboxes lastname">
                <?php echo "<span>Ingresa tu Apellido Paterno.</span>".$form->error($modelPersons,'last_name1'); ?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-user"></i>
                <?php echo $form->textField($modelPersons, 'last_name2', array('placeholder' => "Apelido Materno"));?>
            </div>
             <div class="infoboxes lastname2">
                <p><?php echo "<span>Ingresa tu Apellido Materno.</span>".$form->error($modelPersons,'last_name2'); ?> </p>
            </div>
        </div>
        <input type="button" name="nextform" class="nextform action-button 1" value="Listo.." />
    </fieldset>

   <fieldset>
        <div class="emptycontent"></div>
        <div class="row">

          <?php
        $this->widget(
            'yiiwheels.widgets.formhelpers.WhCountries',
            array(
                'name' => 'Persons[country]',
                'id' => 'Persons_country',
                'value' => 'MX',
                'useHelperSelectBox' => true,
                'pluginOptions' => array(
                    'country' => 'MX',
                    'language' => 'es_ES',
                    'flags' => true
                )
            )
        );
        ?>
         <div class="infoboxes country">
                <span>Ingresa tu pais.</span>
            </div>
        </div>
        <div class="emptycontent"></div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-globe"></i>
                <?php echo $form->textField($modelPersons, 'curp_passport', array('placeholder' => "Pasaporte/Curp"));?>
            </div>
               <div class="infoboxes curp">
               <?php echo "<span>Ingresa curp.</span>".$form->error($modelPersons,'curp_passport'); ?>
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
                <?php echo $form->textField($model, 'email', array('placeholder' => "Email"));?>
            </div>
                 <div class="infoboxes email">
                <?php echo "<span>Ingresa tu email.</span>".$form->error($model,'email'); ?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input type="text" name="Users[email2]" id="Users_email2" placeholder="Verificación de Email" ></input>
            </div>
               <div class="infoboxes email2">
               <span>Verifica tu email.</span>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <?php echo $form->passwordField($model, 'password', array('placeholder' => "Contraseña"));?>
            </div>
               <div class="infoboxes pass">
                  <?php echo "<span>Ingresa tu contraseña.</span>".$form->error($model,'password'); ?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-lock"></i>
                <input type="password" name="Users[password2]" id="Users_password2" placeholder="Verificación de Contraseña"></input>
            </div>
               <div class="infoboxes pass2">
             <span>Confirma tu contraseña</span>
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
                        alert(response);
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
             <input type="button" id="LogInUsers" name="nextform" class="nextform action-button 4" value="Regresar al sitio" />

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