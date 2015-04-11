<?php
/* @var $this SponsorsContactController */
/* @var $model SponsorsContact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-contact-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => false,
));?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);?>

<div class="recopy">
	<div class="row">
		<?php echo $form->labelEx($model, 'type');?>
		<?php echo $form->dropDownList($model, 'type', array(''=>'','TELEFONO'=>'Telèfono','CELULAR'=>'Celular','FAX'=>'Fax','EMAIL'=>'Email'), 
		                     						array('options' => array(''=>array('selected'=>true))),array('name'=>'types[]','size' => 20, 'maxlength' => 20));?>
		<?php echo $form->error($model, 'type');?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model, 'value');?>
		<?php echo $form->textField($model, 'value', array('name'=>'values[]','size' => 20, 'maxlength' => 20));?>
		<?php echo $form->error($model, 'value');?>
	</div>
</div>
	<?php

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->