	<?php
	/* @var $this CurriculumController */
	/* @var $model Curriculum */
	/* @var $form CActiveForm */
	?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'account-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
	<?php echo $form->errorSummary($details); ?>



	<div class="row">
		<?php echo $form->labelEx($details,'password'); ?>
		<?php echo $form->passwordField($details,'password'); ?>
		<?php echo $form->error($details,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($details,'password1'); ?>
		<?php echo $form->passwordField($details,'password1'); ?>
		<?php echo $form->error($details,'password1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($details,'password2'); ?>
		<?php echo $form->passwordField($details,'password2'); ?>
		<?php echo $form->error($details,'password2'); ?>
	</div>

	<div class="row buttons">
			<?php echo CHtml::submitButton("guardar"); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->