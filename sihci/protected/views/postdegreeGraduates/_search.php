<?php
/* @var $this PostdegreeGraduatesController */
/* @var $model PostdegreeGraduates */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

  	<div class="row">

		<legend> Búsqueda por</legend>
			<?php echo $form->textField($model,'fullname',array('size'=>45,'maxlength'=>45,'placeholder'=>'Título de la publicacion')); ?>
			<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->