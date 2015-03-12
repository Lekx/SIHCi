<?php
/* @var $this JobsController */
/* @var $model Jobs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jobs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_curriculum'); ?>
		<?php echo $form->textField($model,'id_curriculum'); ?>
		<?php echo $form->error($model,'id_curriculum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'organization'); ?>
		<?php echo $form->textField($model,'organization',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'organization'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_day'); ?>
		<?php echo $form->textField($model,'start_day'); ?>
		<?php echo $form->error($model,'start_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_month'); ?>
		<?php echo $form->textField($model,'start_month'); ?>
		<?php echo $form->error($model,'start_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_year'); ?>
		<?php echo $form->textField($model,'start_year'); ?>
		<?php echo $form->error($model,'start_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hospital_unit'); ?>
		<?php echo $form->textField($model,'hospital_unit',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'hospital_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rud'); ?>
		<?php echo $form->textField($model,'rud',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'rud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schedule'); ?>
		<?php echo $form->textField($model,'schedule',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'schedule'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->