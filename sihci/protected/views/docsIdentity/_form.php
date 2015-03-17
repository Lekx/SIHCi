<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'docs-identity-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_curriculum'); ?>
		<?php echo $form->textField($model,'id_curriculum'); ?>
		<?php echo $form->error($model,'id_curriculum'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('acta'=>'Acta de Nacimiento','pasaporte'=>'Pasaporte',
															'curp'=>'CURP', 'ife' => 'IFE'), 
		                                              array('options' => array('1'=>array('selected'=>true))), 
		                                              array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>250, 'placeholder'=>'descripción')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'doc_id'); ?>
		<?php echo $form->textField($model,'doc_id',array('size'=>50,'maxlength'=>50, 'placeholder'=>'documento')); ?>
		<?php echo $form->error($model,'doc_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_Primary'); ?>
		<?php echo $form->textField($model,'is_Primary'); ?>
		<?php echo $form->error($model,'is_Primary'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Save'); ?>
		<?php echo CHtml::resetButton($model->isNewRecord ? 'Borrar' : 'Clear'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->