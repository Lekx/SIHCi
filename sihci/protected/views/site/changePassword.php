<?php

	
	$this->pageTitle = 'Recuperar Contraseña';
	$this->breadcrumbs = array('Recuperar Contraseña');

?>
<div class="form">
<?php $form = $this->beginWidget('CActiveForm',
	array(
		'method' => 'POST',
		'action' => Yii::app()->createUrl('site/changePassword'),
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		));
?>


	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'password2'); ?>
		<?php echo $form->textField($model,'password2'); ?>
		<?php echo $form->error($model,'password2'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::submitButton('Cambiar Contraseña', array('class' => 'btn btn-primary')) ; ?>
	</div>

<?php $this->endWidget(); ?>
</div>