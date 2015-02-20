<?php
/* @var $this DomiciliosController */
/* @var $model Domicilios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'domicilios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pais'); ?>
		<?php echo $form->textField($model,'id_pais'); ?>
		<?php echo $form->error($model,'id_pais'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textField($model,'cp'); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'delegacion'); ?>
		<?php echo $form->textField($model,'delegacion',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'delegacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'municipio'); ?>
		<?php echo $form->textField($model,'municipio',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'colonia'); ?>
		<?php echo $form->textField($model,'colonia',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'colonia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calle'); ?>
		<?php echo $form->textField($model,'calle',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'calle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_ext'); ?>
		<?php echo $form->textField($model,'numero_ext',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'numero_ext'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_int'); ?>
		<?php echo $form->textField($model,'numero_int',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'numero_int'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ciudad'); ?>
		<?php echo $form->textField($model,'ciudad',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ciudad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->