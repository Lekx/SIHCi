<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */
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
});
$(document).ready(function(){
	if($("#sponsorsBillingCheck").is(":checked"))
		$("#sponsorsBillingForm").hide();

    $("#sponsorsBillingCheck").click(function(){
       $("#sponsorsBillingForm").toggle();
    });
});
</script>
<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-billing-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
));?>


	Utlizar la misma Direccion.
	<div>
		<input type="checkbox" id="sponsorsBillingCheck" name="sameAddress"  <?php echo $sameAd == true ? "CHECKED" : "";?>/>
	</div>

	<div id="sponsorsBillingForm" id="sponsorsBillingForm">


      <?php $this->widget('ext.CountrySelectorWidget', array(

		'value' => $modelAddresses->country,
		'name' => Chtml::activeName($modelAddresses, 'country'),
		'id' => Chtml::activeId($modelAddresses, 'country'),
		'useCountryCode' => false,
		'defaultValue' => 'Mexico',
		'firstEmpty' => true,
		'firstText' => 'Pais',

		)); ?>



		          <?php /*
$this->widget(
	'yiiwheels.widgets.formhelpers.WhCountries',
	array(
		'name' => 'Addresses[country]',
		'id' => 'Addresses_country',
		//'value' => 'MX',
		'useHelperSelectBox' => true,
		'pluginOptions' => array(
			'country' => 'MX',
			'language' => 'es_ES',
			'flags' => true,
		),
	)
);*/
?>
		<?php echo $form->textField($modelAddresses, 'zip_code', array('placeholder' => 'Código Postal','title' => 'Código Postal', 'class' => 'numericOnly'));?>
		<?php echo $form->error($modelAddresses, 'zip_code');?>

		<?php echo $form->textField($modelAddresses, 'state', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Estado','title' => 'Estado'));?>
		<?php echo $form->error($modelAddresses, 'state');?>

		<?php echo $form->textField($modelAddresses, 'delegation', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Delegación','title' => 'Delegación'));?>
		<?php echo $form->error($modelAddresses, 'delegation');?>

		<?php echo $form->textField($modelAddresses, 'city', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Ciudad','title' => 'Ciudad'));?>
		<?php echo $form->error($modelAddresses, 'city');?>

		<?php echo $form->textField($modelAddresses, 'town', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Municipio','title' => 'Municipio'));?>
		<?php echo $form->error($modelAddresses, 'town');?>

		<?php echo $form->textField($modelAddresses, 'colony', array('size' => 45, 'maxlength' => 45, 'placeholder' => 'Colonia','title' => 'Colonia'));?>
		<?php echo $form->error($modelAddresses, 'colony');?>


		<?php echo $form->textField($modelAddresses, 'street', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Calle', 'title' => 'Calle'));?>
		<?php echo $form->error($modelAddresses, 'street');?>

		<?php echo $form->textField($modelAddresses, 'external_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Externo', 'title' => 'Número Externo','class' => 'numericOnly'));?>
		<?php echo $form->error($modelAddresses, 'external_number');?>

		<?php echo $form->textField($modelAddresses, 'internal_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Interno','title' => 'Número Externo' ,'class' => 'numericOnly'));?>
		<?php echo $form->error($modelAddresses, 'internal_number');?>
	</div>


	<div id="billing" name="billing">
	
		<?php echo $form->textField($model, 'name', array('size' => 45, 'placeholder' => 'Nombre', 'maxlength' => 45,'title' => 'Nombre'));?>
		<?php echo $form->error($model, 'name');?>


		<?php echo $form->textField($model, 'rfc', array('size' => 20, 'placeholder' => 'RFC', 'title' => 'RFC','maxlength' => 20, 'class' => 'numericOnly'));?>
		<?php echo $form->error($model, 'rfc');?>

		<?php echo $form->textField($model, 'email', array('size' => 60, 'placeholder' => 'Email', 'title' => 'Email','maxlength' => 70, 'email' => 'email'));?>
		<?php echo $form->error($model, 'email');?>
	</div>




	<div class="row buttons">
		<?php /* echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); */?>
		<input type="submit"  class="savebutton" onclick="validationFrom()" value="Guardar">
		<input class="cleanbutton" type="button" value="Borrar">
		<?php echo CHtml::Button('Cancelar',array('submit' => array('sponsors/sponsorsInfo'),'confirm'=>'¿Seguro que desea Cancelar?','id'=>'cancelar')); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->