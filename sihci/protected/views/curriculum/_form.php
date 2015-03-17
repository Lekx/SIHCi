<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curriculum-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_actual_address'); ?>
		<?php echo $form->textField($model,'id_actual_address'); ?>
		<?php echo $form->error($model,'id_actual_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'native_country'); ?>
		<?php echo $form->textField($model,'native_country',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'native_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'native_language'); ?>
		<?php echo $form->textField($model,'native_language',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'native_language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SNI'); ?>
		<?php echo $form->textField($model,'SNI'); ?>
		<?php echo $form->error($model,'SNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'researcher_title'); ?>
		<?php echo $form->textField($model,'researcher_title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'researcher_title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->