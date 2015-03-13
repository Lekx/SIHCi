<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'account-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($details); ?>

	<div class="row">
		<?php echo $form->labelEx($details,'email'); ?>
		<?php echo $form->textField($details,'email'); ?>
		<?php echo $form->error($details,'email'); ?>
	</div>
		<div class="row">
		<?php echo $form->labelEx($details,'email'); ?>
		<?php echo $form->textField($details,'email'); ?>
		<?php echo $form->error($details,'email'); ?>
	</div>


	
<input type="text">
<input type="text">
<select><option></option><option>1</option><option>2</option></select>
	<div class="row buttons">
		<?php echo CHtml::submitButton("GUARDAR"); ?>

		<input type="reset" value="BORRAR" >
			<?php echo CHtml::link("CANCELAR",array('account/infoAccount')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->