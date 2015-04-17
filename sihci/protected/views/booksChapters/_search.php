<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */
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
		<?php echo $form->label($model,'chapter_title'); ?>
		<?php echo $form->textField($model,'chapter_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_title'); ?>
		<?php echo $form->textField($model,'book_title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publishing_year'); ?>
		<?php echo $form->textField($model,'publishing_year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'publishers'); ?>
		<?php echo $form->textField($model,'publishers',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'editorial'); ?>
		<?php echo $form->textField($model,'editorial',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'volume'); ?>
		<?php echo $form->textField($model,'volume',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pages'); ?>
		<?php echo $form->textField($model,'pages'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'citations'); ?>
		<?php echo $form->textField($model,'citations'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_of_authors'); ?>
		<?php echo $form->textField($model,'total_of_authors'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discipline'); ?>
		<?php echo $form->textField($model,'discipline',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdiscipline'); ?>
		<?php echo $form->textField($model,'subdiscipline',array('size'=>45,'maxlength'=>45)); ?>
	</div>

 <?php/*
	<div class="row">
		<?php echo $form->label($model,'creation_date'); ?>
		<?php echo $form->textField($model,'creation_date'); ?>
	</div>
    
   
	  <div class="row">
        <?php echo $form->label($model,'url_doc'); ?>
        <?php echo $form->textField($model,'url_doc',array('size'=>60,'maxlength'=>100)); ?>
    </div>
      */ ?> 
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->