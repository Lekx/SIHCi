<?php
/* @var $this FilesManagerController */
/* @var $model FilesManager */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	

<?php $this->endWidget(); ?>

</div><!-- search-form -->