<?php
/* @var $this DirectedThesisController */
/* @var $model DirectedThesis */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row">
		
		<legend>B&uacutesqueda por:</legend>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Titulo o Autor')); ?>	
		<?php echo CHtml::submitButton('Buscar'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->