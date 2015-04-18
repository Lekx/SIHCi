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
		<?php echo $form->textField($model,'owner',array('size'=>60,'maxlength'=>250, 'placeholder'=>'Ejemplo: Ricardo')); ?>	
		
		<?php echo CHtml::submitButton('Buscar'); ?>

	</fieldset>
		

<?php $this->endWidget(); ?>

</div><!-- search-form -->
