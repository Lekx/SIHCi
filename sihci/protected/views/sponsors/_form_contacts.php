<?php
/* @var $this SponsorsContactsController */
/* @var $model SponsorsContacts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'sponsors-contacts-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
));?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);?>
<div class="recopy">
	<div class="row">
		<?php
	echo $form->labelEx($model, 'fullname');
	echo $form->textField($model, 'fullname', array('name' => 'fullnames[]','size' => 60, 'maxlength' => 70));
	echo $form->error($model, 'fullname');
?>

	</div>
</div>



	<div class="row">
		<?php
foreach ($fullname as $value) {
	echo "<input type='hidden' value='".$value['id']."' name ='fullnamesUpdateId[]'>";
	echo $form->labelEx($model, 'fullname');
	echo $form->textField($model, 'fullname', array('name' => 'fullnamesUpdate[]', 'value' => $value['fullname'], 'size' => 60, 'maxlength' => 70));
	echo $form->error($model, 'fullname');
	//echo "<input type='button' value='".$value['id']."' name ='fullnamesUpdateId[]'>";
	echo CHtml::link('Eliminar',array('Sponsors/deleteContacts','id'=>$value['id']));
}
?>

	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
	</div>


	<?php

$this->widget('ext.widgets.reCopy.ReCopyWidget', array(
	'targetClass' => 'recopy',
	'addButtonLabel' => 'Agregar nuevo',
));
?>

<?php $this->endWidget();?>

</div><!-- form -->
