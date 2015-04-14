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


	<fieldset>
       <?php echo $form->textField($model,'title',array('placeholder'=>'Nombre de la tesis')); ?>
       o
       <?php echo $form->textField($model,'author',array('placeholder'=>'Nombre del autor')); ?>
       <?php echo CHtml::submitButton('Buscar');?>   
	</fieldset>

<?php $this->endWidget(); ?>

</div><!-- search-form -->