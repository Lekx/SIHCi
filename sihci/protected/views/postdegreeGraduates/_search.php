<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'enableAjaxValidation'=>true,
	'method'=>'get',
)); ?>
	
	<div class="inner-addon right-addon">
		
   		<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Búsqueda por columna','class'=>'searchcrud')); ?>	
 		<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>
 	</div>


<?php $this->endWidget(); ?>

</div><!-- search-form -->