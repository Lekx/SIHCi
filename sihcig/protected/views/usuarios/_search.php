<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
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
		<?php echo $form->label($model,'id_rol'); ?>
		<?php echo $form->textField($model,'id_rol'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contrasena'); ?>
		<?php echo $form->textField($model,'contrasena',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_registro'); ?>
		<?php echo $form->textField($model,'fecha_registro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_activacion'); ?>
		<?php echo $form->textField($model,'fecha_activacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'llave_act_rec'); ?>
		<?php echo $form->textField($model,'llave_act_rec',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estatus'); ?>
		<?php echo $form->textField($model,'estatus'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->