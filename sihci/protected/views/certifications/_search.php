<?php
/* @var $this CertificationsController */
/* @var $model Certifications */
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
		<?php echo $form->label($model,'folio'); ?>
		<?php echo $form->textField($model,'folio',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reference'); ?>
		<?php echo $form->textField($model,'reference',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reference_type'); ?>
		<?php echo $form->textField($model,'reference_type',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'specialty'); ?>
		<?php echo $form->textField($model,'specialty',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'validity_date_start'); ?>
		<?php echo $form->textField($model,'validity_date_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'validity_date_end'); ?>
		<?php echo $form->textField($model,'validity_date_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->