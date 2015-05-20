
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
	
		<?php echo CHtml::submitButton('Buscar'); ?>
	

<?php $this->endWidget(); ?>

</div><!-- search-form -->