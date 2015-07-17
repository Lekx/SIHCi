<?php
/* @var $this BooksController */
/* @var $model Books */
/* @var $form CActiveForm */
//LI06-Barra de busqueda
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl("adminUsers"),
	'method'=>'get',
)); ?>

		<div class="row subtitleadmin">
		<h4>Gestionar Area:</h4>
		</div>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Ejemplo: Ricardo','class'=>'searchadmin')); ?>	
		<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>
	   	<?php echo CHtml::link('Crear',array('AdminUsers/CreateUser'),array('class'=>'admin_create')); ?>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->
