<?php

	
	$this->pageTitle = 'Recuperar Contraseña';
	$this->breadcrumbs = array('Recuperar Contraseña');
	echo $msg;
?>
<div class="form">
<?php $form = $this->beginWidget('CActiveForm',
	array(
		'method' => 'POST',
		'action' => Yii::app()->createUrl('site/recoveryPassword'),
		'enableClientValidation' => true,
		'clientOptions' => array(
			'validateOnSubmit' => true,
			),
		));
?>


	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<?php  ?>

	<div class="row">
		<?php echo CHtml::submitButton('Recuperar Contraseña', array('class' => 'btn btn-primary')) ; ?>
	</div>

<?php $this->endWidget(); ?>
</div>