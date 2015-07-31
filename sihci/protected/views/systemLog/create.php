<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */



$this->menu=array(
	array('label'=>'List SystemLog', 'url'=>array('index')),
	array('label'=>'Manage SystemLog', 'url'=>array('admin')),
);
?>

<h1>Create SystemLog</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
