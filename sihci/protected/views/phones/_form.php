<?php
/* @var $this PhonesController */
/* @var $model Phones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'phones-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_person'); ?>
		<?php echo $form->textField($model,'id_person'); ?>
		<?php echo $form->error($model,'id_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_code'); ?>
		<?php echo $form->textField($model,'country_code'); ?>
		<?php echo $form->error($model,'country_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'local_area_code'); ?>
		<?php echo $form->textField($model,'local_area_code'); ?>
		<?php echo $form->error($model,'local_area_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number'); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'extension'); ?>
		<?php echo $form->textField($model,'extension'); ?>
		<?php echo $form->error($model,'extension'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_primary'); ?>
		<?php echo $form->textField($model,'is_primary'); ?>
		<?php echo $form->error($model,'is_primary'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->