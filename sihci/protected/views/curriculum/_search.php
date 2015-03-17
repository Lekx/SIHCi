<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */
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
		<?php echo $form->label($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_actual_address'); ?>
		<?php echo $form->textField($model,'id_actual_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'native_country'); ?>
		<?php echo $form->textField($model,'native_country',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'native_language'); ?>
		<?php echo $form->textField($model,'native_language',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SNI'); ?>
		<?php echo $form->textField($model,'SNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'researcher_title'); ?>
		<?php echo $form->textField($model,'researcher_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->