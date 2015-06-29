<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'searchValue',
	'action'=>Yii::app()->createUrl($this->route),
	'enableAjaxValidation'=>true,
	'method'=>'get',
)); ?>

		<div class="row subtitleadmin">
		<h4>Gestionar Linea:</h4>
		</div>
	   	<?php echo $form->textField($model,'searchValue',array('size'=>60,'maxlength'=>70, 'placeholder'=>'Buscar Por: Nombre','class'=>'searchadmin')); ?>
	   	<?php echo CHtml::submitButton('',array('class'=>'adminbut')); ?>
	   	<?php echo CHtml::link('Crear',array('adminResearchAreas/create'),array('class'=>'admin_create')); ?>
	


<?php $this->endWidget(); ?>

</div><!-- search-form -->