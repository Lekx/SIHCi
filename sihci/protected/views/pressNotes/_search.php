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
	<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-search"></i>
		<?php echo $form->textField($model,'searchValue',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título de la publicacion','class'=>'searchcrud')); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->