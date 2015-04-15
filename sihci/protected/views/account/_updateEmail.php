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
	<div>
		Nuevo Correo:</br>
	<input type="text" name="Account[email2]" id="Account_email2">
	</div>

	<div>
		Repetir Nuevo Correo:</br>
		<input type="text" name="Account[email22]" id="Account_email22">
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton("GUARDAR"); ?>
		<input type="reset" value="BORRAR">
		<?php echo CHtml::link("CANCELAR",array('account/infoAccount')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->