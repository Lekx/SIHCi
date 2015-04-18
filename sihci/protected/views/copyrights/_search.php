<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_curriculum'); ?>
		<?php echo $form->textField($model,'id_curriculum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'participation_type'); ?>
		<?php echo $form->textField($model,'participation_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_date'); ?>
		<?php echo $form->textField($model,'application_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'step_number'); ?>
		<?php echo $form->textField($model,'step_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resume'); ?>
		<?php echo $form->textArea($model,'resume',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beneficiary'); ?>
		<?php echo $form->textField($model,'beneficiary',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entity'); ?>
		<?php echo $form->textField($model,'entity',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impact_value'); ?>
		<?php echo $form->textArea($model,'impact_value',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->