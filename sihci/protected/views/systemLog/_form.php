<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'system-log-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'section'); ?>
		<?php echo $form->textField($model,'section',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'section'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textField($model,'details',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datetime'); ?>
		<?php echo $form->textField($model,'datetime'); ?>
		<?php echo $form->error($model,'datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->