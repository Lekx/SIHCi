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


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);?>
	<?php echo $form->errorSummary($modelAddresses);?>
	Utlizar la misma Direccion.
	<div>
		<input type="checkbox" id="sponsorsBillingCheck" name="sameAddress"  <?php echo $sameAd == true ? "CHECKED" : "";?>/>
	</div>

	<div id="sponsorsBillingForm" id="sponsorsBillingForm">
		<div class="row">
		<?php echo $form->labelEx($modelAddresses, 'country');?>
		<?php echo $form->textField($modelAddresses, 'country', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'País'));?>
		<?php echo $form->error($modelAddresses, 'country');?>
		</div>

		<?php echo $form->labelEx($modelAddresses, 'zip_code');?>
		<?php echo $form->textField($modelAddresses, 'zip_code', array('placeholder' => 'Código Postal'));?>
		<?php echo $form->error($modelAddresses, 'zip_code');?>

		<?php echo $form->labelEx($modelAddresses, 'state');?>
		<?php echo $form->textField($modelAddresses, 'state', array('size' => 20, 'maxlength' => 20, 'placeholder' => 'Estado'));?>
		<?php echo $form->error($modelAddresses, 'state');?>

		<?php echo $form->labelEx($modelAddresses, 'delegation');?>
		<?php echo $form->textField($modelAddresses, 'delegation', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Delegación'));?>
		<?php echo $form->error($modelAddresses, 'delegation');?>

		<?php echo $form->labelEx($modelAddresses, 'city');?>
		<?php echo $form->textField($modelAddresses, 'city', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Ciudad'));?>
		<?php echo $form->error($modelAddresses, 'city');?>

		<?php echo $form->labelEx($modelAddresses, 'town');?>
		<?php echo $form->textField($modelAddresses, 'town', array('size' => 30, 'maxlength' => 30, 'placeholder' => 'Municipio'));?>
		<?php echo $form->error($modelAddresses, 'town');?>

		<?php echo $form->labelEx($modelAddresses, 'colony');?>
		<?php echo $form->textField($modelAddresses, 'colony', array('size' => 45, 'maxlength' => 45, 'placeholder' => 'Colonia'));?>
		<?php echo $form->error($modelAddresses, 'colony');?>

		<?php echo $form->labelEx($modelAddresses, 'street');?>
		<?php echo $form->textField($modelAddresses, 'street', array('size' => 50, 'maxlength' => 50, 'placeholder' => 'Calle'));?>
		<?php echo $form->error($modelAddresses, 'street');?>

		<?php echo $form->labelEx($modelAddresses, 'external_number');?>
		<?php echo $form->textField($modelAddresses, 'external_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Externo'));?>
		<?php echo $form->error($modelAddresses, 'external_number');?>

		<?php echo $form->labelEx($modelAddresses, 'internal_number');?>
		<?php echo $form->textField($modelAddresses, 'internal_number', array('size' => 8, 'maxlength' => 8, 'placeholder' => 'Número Interno'));?>
		<?php echo $form->error($modelAddresses, 'internal_number');?>
	</div>


	<div id="billing" name="billing">
		<?php echo $form->labelEx($model, 'name');?>
		<?php echo $form->textField($model, 'name', array('size' => 45, 'maxlength' => 45));?>
		<?php echo $form->error($model, 'name');?>

		<?php echo $form->labelEx($model, 'rfc');?>
		<?php echo $form->textField($model, 'rfc', array('size' => 20, 'maxlength' => 20));?>
		<?php echo $form->error($model, 'rfc');?>

		<?php echo $form->labelEx($model, 'email');?>
		<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 70));?>
		<?php echo $form->error($model, 'email');?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->