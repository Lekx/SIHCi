<?php
/* @var $this BooksController */
/* @var $model Books */
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
		<?php echo $form->label($model,'isbn'); ?>
		<?php echo $form->textField($model,'isbn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_title'); ?>
		<?php echo $form->textField($model,'book_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publisher'); ?>
		<?php echo $form->textField($model,'publisher',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'editorial'); ?>
		<?php echo $form->textField($model,'editorial',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'edition'); ?>
		<?php echo $form->textField($model,'edition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publishing_year'); ?>
		<?php echo $form->textField($model,'publishing_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'release_date'); ?>
		<?php echo $form->textField($model,'release_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'volume'); ?>
		<?php echo $form->textField($model,'volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pages'); ?>
		<?php echo $form->textField($model,'pages'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copies_issued'); ?>
		<?php echo $form->textField($model,'copies_issued'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'work_type'); ?>
		<?php echo $form->textField($model,'work_type',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idioma'); ?>
		<?php echo $form->textField($model,'idioma',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'traductor_type'); ?>
		<?php echo $form->textField($model,'traductor_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'traductor'); ?>
		<?php echo $form->textField($model,'traductor',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdiscipline'); ?>
		<?php echo $form->textField($model,'subdiscipline',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'path'); ?>
		<?php echo $form->textField($model,'path',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250)); ?>
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