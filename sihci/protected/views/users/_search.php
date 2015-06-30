<?php
/* @var $this BooksController */
/* @var $model Books */
/* @var $form CActiveForm */
//LI06-Barra de busqueda
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="inner-addon right-addon">
					 <i class="glyphicon glyphicon-search"></i>

	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Ejemplo: Ricardo','class'=>'searchcrud')); ?>
			<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>

	</div>


<?php $this->endWidget(); ?>

</div><!-- search-form -->
