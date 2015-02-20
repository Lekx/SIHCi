<?php
/* @var $this PersonasController */
/* @var $model Personas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a_paterno'); ?>
		<?php echo $form->textField($model,'a_paterno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'a_paterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a_materno'); ?>
		<?php echo $form->textField($model,'a_materno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'a_materno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'edo_civil'); ?>
		<?php echo $form->textField($model,'edo_civil',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'edo_civil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sexo'); ?>
		<?php echo $form->textField($model,'sexo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sexo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_nacimiento'); ?>
		<?php echo $form->textField($model,'fecha_nacimiento'); ?>
		<?php echo $form->error($model,'fecha_nacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rfc_rud'); ?>
		<?php echo $form->textField($model,'rfc_rud',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rfc_rud'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->