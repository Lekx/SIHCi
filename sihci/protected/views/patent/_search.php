<?php
/* @var $this PatentController */
/* @var $model Patent */
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
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'participation_type'); ?>
		<?php echo $form->textField($model,'participation_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_type'); ?>
		<?php echo $form->textField($model,'application_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_number'); ?>
		<?php echo $form->textField($model,'application_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'patent_type'); ?>
		<?php echo $form->textField($model,'patent_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'consession_date'); ?>
		<?php echo $form->textField($model,'consession_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'record'); ?>
		<?php echo $form->textField($model,'record',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'presentation_date'); ?>
		<?php echo $form->textField($model,'presentation_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'international_clasification'); ?>
		<?php echo $form->textField($model,'international_clasification',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner'); ?>
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resumen'); ?>
		<?php echo $form->textArea($model,'resumen',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'industrial_exploitation'); ?>
		<?php echo $form->textField($model,'industrial_exploitation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resource_operator'); ?>
		<?php echo $form->textField($model,'resource_operator',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->