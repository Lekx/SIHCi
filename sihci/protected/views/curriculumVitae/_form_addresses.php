<?php
/* @var $this AddressesController */
/* @var $model Addresses */
/* @var $form CActiveForm */
?>
	<script>
		function cleanUp(){
			var text;
			var result = confirm("¿Está usted seguro de limpiar estos datos?");
			if (result==true) {
				$('[id^=Addresses_]').val('');
			}else{

			}
			document.getElementById("demo").innerHTML = text;
		}
		function validationFrom(){
			alert("Registro Realizado con éxito");
			return false;
		}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'addresses-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		
		<?php echo $form->textField($model,'country',array('size'=>50,'maxlength'=>50, 'placeholder'=>'País')); ?>
		 <div class="infobox ">
                Paises
          </div>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->textField($model,'zip_code',array('placeholder'=>'Código Postal')); ?>
		 <div class="infobox ">
                Codigo Postal
          </div>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'state',array('size'=>20,'maxlength'=>20, 'placeholder'=>'Estado')); ?>
		 <div class="infobox ">
                Estado
          </div>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'delegation',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Delegación')); ?>
		 <div class="infobox ">
                Delegación
          </div>
		<?php echo $form->error($model,'delegation'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Ciudad')); ?>
		 <div class="infobox ">
                Ciudad
          </div>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'town',array('size'=>30,'maxlength'=>30, 'placeholder'=>'Municipio')); ?>
		 <div class="infobox ">
                Municipio
          </div>
		<?php echo $form->error($model,'town'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'colony',array('size'=>45,'maxlength'=>45, 'placeholder'=>'Colonia')); ?>
		 <div class="infobox ">
                Colonia
          </div>
		<?php echo $form->error($model,'colony'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'street',array('size'=>50,'maxlength'=>50, 'placeholder'=>'Calle')); ?>
		 <div class="infobox ">
                Calle
          </div>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'external_number',array('size'=>8,'maxlength'=>8, 'placeholder'=>'Número Externo')); ?>
		 <div class="infobox ">
                Numero Externo
          </div>
		<?php echo $form->error($model,'external_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'internal_number',array('size'=>8,'maxlength'=>8, 'placeholder'=>'Número Interno')); ?>
		 <div class="infobox ">
                Numero Interior
          </div>
		<?php echo $form->error($model,'internal_number'); ?>
	</div>

	<div class="row buttons">
		<input class="savebutton" type="submit" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" onclick="cleanUp()" value="Limpiar">
		<?php echo CHtml::link('Cancelar',array('/site/index')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->