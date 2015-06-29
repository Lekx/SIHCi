<?php
/* @var $this BooksChaptersAuthorsController */
/* @var $model BooksChaptersAuthors */
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
		<?php echo $form->label($model,'id_art_guides'); ?>
		<?php echo $form->textField($model,'id_art_guides'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'names'); ?>
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name1'); ?>
		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_name2'); ?>
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->