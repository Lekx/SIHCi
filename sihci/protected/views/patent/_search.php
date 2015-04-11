<?php
//RP06-Barra de Busqueda 
/* @var $this PatentController */
/* @var $model Patent */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<fieldset>
		
		<legend>Búsqueda por:</legend>		

		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250, 'placeholder'=>'Ejemplo: cosa')); ?>	
		<?php echo CHtml::submitButton('Buscar'); ?>

	</fieldset>
		

<?php $this->endWidget(); ?>

</div><!-- search-form -->