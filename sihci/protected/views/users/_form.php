<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<script type="text/javascript">

  $('.lettersAndNumbers').bind('keyup input',function(){
    var input = $(this);
    input.val(input.val().replace(/[^a-z0-9A-ZñÑ´'ÁáÉéÍíÓóÚú ]/g,'') );
  });

    function lettersOnly(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
      especiales = "8-9-37-38-46-164";

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
    function numericOnly(e) {
      key = e.keyCode || e.which;
      tecla = String.fromCharCode(key).toLowerCase();
      numbers = " 1234567890";
      especiales = "8-9-37-38-46-164";

      tecla_especial = false
      for (var i in especiales) {
        if (key == especiales[i]) {
          tecla_especial = true;
          break;
        }
      }

      if (numbers.indexOf(tecla) == -1 && !tecla_especial)
        return false;
    }
</script>



<?php
            $baseUrl = Yii::app()->baseUrl;
            $cs = Yii::app()->getClientScript();
            $cs->registerScriptFile($baseUrl . '/js/ajaxfile.js');
            //$cs->registerScriptFile($baseUrl . '/js/numbersLettersOnly.js');
?>
<div id="crateusers" class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'users-form',
    'enableAjaxValidation'=>true,
    'action'=>$this->createUrl('users/create'),
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
                <?php echo $form->textField($modelPersons, 'last_name2', array('placeholder' => "Apellido Materno" ,'title'=>'Ingresa tu Apellido Materno','onKeypress'=>'return lettersOnly(event)'));?>
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
          <?php /*
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
                ),
                'htmlOptions'=> array(
                    'title'=> 'Pais'
                )
            )
        );*/
        ?>
        </div>
        <div class="emptycontent"></div>
        <div class="row">


            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-globe"></i>
                <?php echo $form->textField($modelPersons, 'curp_passport', array('placeholder' => "CURP / Pasaporte", 'title'=>'CURP / Pasaporte','class'=>'lettersAndNumbers'));?>
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
                <?php echo $form->textField($model, 'email', array('placeholder' => "Correo electronico", 'title'=>'Ingresa tu dirección de correo electronico'));?>
            </div>
        </div>
        <div class="row">
            <div class="inner-addon right-addon">
                <i class="glyphicon glyphicon-envelope"></i>
                <input type="text" title="Confirma tu dirección de email" name="Users[email2]" id="Users_email2" placeholder="Verificación de Email" ></input>
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
                <input type="password" title="Confirma tu Contraseña" name="Users[password2]" id="Users_password2" placeholder="Verificación de Contraseña"></input>
            </div>


        </div>

        <input type="hidden" name="Users[registration_date]" id="Users_registration_date" value="0000-00-00 00:00:00">
        <input type="hidden" name="Users[activation_date]" id="activation_registration_date" value="0000-00-00 00:00:00">
        <input type="hidden" name="Users[act_react_key]" id="Users_act_react_key" value="0000-00-00 00:00:00">


        <input type="button" name="previousform" class="previousform action-button" value="Regresar.." />

        <div class="row buttons">

          <?php echo CHtml::htmlButton('Enviar',array(
                      'onclick'=>'send("users-form", "users/create", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","site","")',
                      'class'=>'savehome',
                  ));
          ?>
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
