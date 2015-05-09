<?php
/* @var $this BooksChaptersController */
/* @var $model BooksChapters */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row">
		
		<legend>B&uacute;squeda por:</legend>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Titulo de libro, Título de Capítulo, Editores')); ?>	
		<?php echo CHtml::submitButton('Buscar'); ?>

	</div>

	
<?php $this->endWidget(); ?>

</div><!-- search-form -->