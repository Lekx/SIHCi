<?php
//DP06-Barra de Busqueda 

/* @var $this PressNotesController */
/* @var $model PressNotes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
		<?php echo $form->textField($model,'searchValue',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título de la publicacion','class'=>'searchcrud')); ?>
		<?php echo CHtml::submitButton('',array('class'=>'searchcrudbut')); ?>

<?php $this->endWidget(); ?>

</div><!-- search-form -->