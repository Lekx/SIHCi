
<?php
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>'search',
	'method'=>'get',
)); ?>
		<?php 
		//echo $form->textField($model,array('size'=>60,'maxlength'=>70, 'placeholder'=>'Buscar')); ?>	
		<input type="text" name="text" placeholder="Buscar">
		<?php echo CHtml::submitButton('Buscar'); ?>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->