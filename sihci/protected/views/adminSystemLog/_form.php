<?php
/* @var $this AdminSystemLogController */
/* @var $model SystemLog */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'system-log-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>



	<div class="row">
		<?php echo $form->textField($model,'id_user',array('placeholder'=>'N.Usuario','title'=>'N.Usuario')); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">

		<?php echo $form->textField($model,'section',array('size'=>60,'maxlength'=>60,'placeholder'=>'Sección','title'=>'Sección')); ?>
		<?php echo $form->error($model,'section'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'details',array('size'=>60,'maxlength'=>150,'placeholder'=>'Detalles','title'=>'Detalle')); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'action',array('size'=>60,'maxlength'=>250,'placeholder'=>'Acción','title'=>'Acción')); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->textField($model,'datetime',array('placeholder'=>'Fecha','title'=>'Fecha')); ?>
		<?php echo $form->error($model,'datetime'); ?>
	</div>

	<div class="row buttons">
				 <?php  echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Modificar', array('class'=>'savebutton')); ?>
					<?php echo CHtml::Button('Cancelar',array('submit' => array('adminSystemLog/admin'),'confirm'=>'Si cancela todo los datos escritos se borraran. ¿Está seguro de que desea cancelar?')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
