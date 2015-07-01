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


<div class="inner-addon right-addon">
                     <i class="glyphicon glyphicon-search"></i>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Búsqueda por columna','class'=>'searchcrud')); ?>
		<?php //echo CHtml::submitButton('',array('class'=>'searchcrudbut')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->