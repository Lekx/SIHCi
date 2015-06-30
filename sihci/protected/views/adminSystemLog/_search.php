

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

	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Búsqueda por columna','class'=>'searchcrud')); ?>
		<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>


<?php $this->endWidget(); ?>

</div><!-- search-form -->
