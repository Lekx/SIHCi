<?php
/* @var $this JobsController */
/* @var $model Jobs */
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
		<?php echo $form->label($model,'organization'); ?>
		<?php echo $form->textField($model,'organization',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_day'); ?>
		<?php echo $form->textField($model,'start_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_month'); ?>
		<?php echo $form->textField($model,'start_month'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_year'); ?>
		<?php echo $form->textField($model,'start_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hospital_unit'); ?>
		<?php echo $form->textField($model,'hospital_unit',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rud'); ?>
		<?php echo $form->textField($model,'rud',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'schedule'); ?>
		<?php echo $form->textField($model,'schedule',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->