<?php
//RD06-Barra de Busqueda 

/* @var $this PressNotesController */
/* @var $model PressNotes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	<fieldset>
		
		<legend> Publicacion a buscar  </legend>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título de la publicacion')); ?>
		<?php echo CHtml::submitButton('Buscar'); ?>

	</fieldset>
		


<?php $this->endWidget(); ?>

</div><!-- search-form -->