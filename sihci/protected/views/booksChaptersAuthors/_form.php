<?php
/* @var $this BooksChaptersAuthorsController */
/* @var $model BooksChaptersAuthors */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'books-chapters-authors-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_art_guides'); ?>
		<?php echo $form->textField($model,'id_art_guides'); ?>
		<?php echo $form->error($model,'id_art_guides'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'names'); ?>
		<?php echo $form->textField($model,'names',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'names'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name1'); ?>
		<?php echo $form->textField($model,'last_name1',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'last_name1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name2'); ?>
		<?php echo $form->textField($model,'last_name2',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'last_name2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->