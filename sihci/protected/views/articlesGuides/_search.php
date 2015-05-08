<?php
/* @var $this ArticlesGuidesController */
/* @var $model ArticlesGuides */
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
		<?php echo $form->label($model,'id_resume'); ?>
		<?php echo $form->textField($model,'id_resume'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isbn'); ?>
		<?php echo $form->textField($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'editorial'); ?>
		<?php echo $form->textField($model,'editorial',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edicion'); ?>
		<?php echo $form->textField($model,'edicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publishing_year'); ?>
		<?php echo $form->textField($model,'publishing_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'volumen'); ?>
		<?php echo $form->textField($model,'volumen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'volumen_no'); ?>
		<?php echo $form->textField($model,'volumen_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_page'); ?>
		<?php echo $form->textField($model,'start_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_page'); ?>
		<?php echo $form->textField($model,'end_page'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'article_type'); ?>
		<?php echo $form->textField($model,'article_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copies_issued'); ?>
		<?php echo $form->textField($model,'copies_issued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'magazine'); ?>
		<?php echo $form->textField($model,'magazine',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdiscipline'); ?>
		<?php echo $form->textField($model,'subdiscipline',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url_document'); ?>
		<?php echo $form->textField($model,'url_document',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>15,'maxlength'=>15)); ?>
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