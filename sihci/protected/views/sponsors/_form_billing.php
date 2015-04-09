<?php
/* @var $this SponsorsBillingController */
/* @var $model SponsorsBilling */
/* @var $form CActiveForm */
?>

<script>
$(document).ready(function(){
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
	Utlizar la misma Direccion.
	<div>
		<input type="checkbox" id="sponsorsBillingCheck"  />
	</div>

	<div id="sponsorsBillingForm" id="sponsorsBillingForm">

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