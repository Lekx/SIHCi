<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<fieldset>
	
		<?php echo $form->textField($model,'id_user',array('size'=>60,'maxlength'=>60, 'placeholder'=>'Numero de Usuario')); ?>
		<?php echo $form->textField($model,'section',array('size'=>60,'maxlength'=>60, 'placeholder'=>'Seccion')); ?>

		<?php echo CHtml::submitButton('Buscar'); ?>
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- search-form -->