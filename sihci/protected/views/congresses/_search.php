<?php
/* @var $this CongressesController */
/* @var $model Congresses */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'searchValue',
	'action'=>Yii::app()->createUrl($this->route),
	'enableAjaxValidation'=>true,
	'method'=>'get',
)); ?>


		<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-search"></i>

	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Titulo de trabajo, Congreso o Palabras claves','class'=>'searchcrud')); ?>
		<?php //echo CHtml::submitButton('',array('class'=>'searchcrudbut')); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->