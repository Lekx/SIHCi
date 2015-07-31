<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */
/* @var $form CActiveForm */
?>

<script>
$(document).ready(function(){
	if($("#sponsorsBillingCheck").is(":checked"))
		$("#sponsorsBillingForm").hide();
    $("#sponsorsBillingCheck").click(function(){
       $("#sponsorsBillingForm").toggle();
    });
});



function lettersOnly(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
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

function lettersAndNumbersOnly(e) {
  key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890.";
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
</script>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-billing-form',
	'enableAjaxValidation' => true,
));?>


	Utlizar la misma Direccion.
	<div class="row">
		<input type="checkbox" id="sponsorsBillingCheck" name="sameAddress"  <?php echo $sameAd == true ? "CHECKED" : "";?>/>
	</div>
	</div>
	<div id="sponsorsBillingForm" id="sponsorsBillingForm">

<div class="row">
  <span class="plain-select">
      <?php $this->widget('ext.CountrySelectorWidget', array(
		'value' => $modelAddresses->country,
		'name' => Chtml::activeName($modelAddresses, 'country'),
		'id' => Chtml::activeId($modelAddresses, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',
		)); ?>
</span>
</div>

<div class="row">
		<?php echo $form->textField($modelAddresses, 'zip_code', array('placeholder' => 'Código Postal','title' => 'Código Postal', 'onKeypress'=>'return numericOnly(event)',));?>
		<?php echo $form->error($modelAddresses, 'zip_code');?>
</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'state', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Estado','onKeypress'=>'return lettersOnly(event)','title' => 'Estado',));?>
		<?php echo $form->error($modelAddresses, 'state');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'delegation', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Delegación','onKeypress'=>'return lettersOnly(event)','title' => 'Delegación'));?>
		<?php echo $form->error($modelAddresses, 'delegation');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'city', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Ciudad','onKeypress'=>'return lettersOnly(event)','title' => 'Ciudad'));?>
		<?php echo $form->error($modelAddresses, 'city');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'town', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Municipio','onKeypress'=>'return lettersOnly(event)','title' => 'Municipio'));?>
		<?php echo $form->error($modelAddresses, 'town');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'colony', array('size' => 45, 'maxlength' => 45, 'placeholder' => 'Colonia','onKeypress'=>'return lettersAndNumbersOnly(event)','title' => 'Colonia'));?>
		<?php echo $form->error($modelAddresses, 'colony');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'street', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Calle', 'onKeypress'=>'return lettersAndNumbersOnly(event)','title' => 'Calle'));?>
		<?php echo $form->error($modelAddresses, 'street');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'external_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Externo', 'title' => 'Número Externo','onKeypress'=>'return lettersAndNumbersOnly(event)'));?>
		<?php echo $form->error($modelAddresses, 'external_number');?>
		</div>
<div class="row">
		<?php echo $form->textField($modelAddresses, 'internal_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Interno','title' => 'Número Externo' ,'onKeypress'=>'return lettersAndNumbersOnly(event)',));?>
		<?php echo $form->error($modelAddresses, 'internal_number');?>
		</div>
	</div>


	<div id="billing" name="billing">
	<div class="row">
		<?php echo $form->textField($model, 'name', array('size' => 45, 'placeholder' => 'Nombre', 'maxlength' => 45,'title' => 'Nombre','onKeypress'=>'return lettersOnly(event)',));?>
		<?php echo $form->error($model, 'name');?>
</div>
<div class="row">
		<?php echo $form->textField($model, 'rfc', array('size' => 20, 'placeholder' => 'RFC', 'title' => 'RFC','maxlength' => 20));?>
		<?php echo $form->error($model, 'rfc');?>
		</div>
<div class="row">
		<?php echo $form->textField($model, 'email', array('size' => 60, 'placeholder' => 'Correo electronico', 'title' => 'Email','maxlength' => 70, 'email' => 'email'));?>
		<?php echo $form->error($model, 'email');?>
		</div>
	</div>




	<div class="row buttons">
    <?php echo CHtml::htmlButton('Guardar',array(
                'onclick'=>'send("sponsors-billing-form", "sponsors/create_billing", "'.(isset($_GET['id']) ? $_GET['id'] : 0).'","'.Yii::app()->controller->id.'/'.Yii::app()->controller->action->id.'/'.(isset($_GET['id']) ? $_GET['id'] : 0).'","")',
                'class'=>'savebutton',
            ));
    ?>		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->
