<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */
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
		<?php echo $form->label($model,'term1'); ?>
		<?php echo $form->textArea($model,'term1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'term2'); ?>
		<?php echo $form->textArea($model,'term2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'term3'); ?>
		<?php echo $form->textArea($model,'term3',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'term4'); ?>
		<?php echo $form->textArea($model,'term4',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'term5'); ?>
		<?php echo $form->textArea($model,'term5',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div> 
<?php $this->endWidget(); ?>

</div><!-- search-form -->