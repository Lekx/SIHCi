<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */

$this->breadcrumbs=array(
	'System Logs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SystemLog', 'url'=>array('index')),
	array('label'=>'Manage SystemLog', 'url'=>array('admin')),
);
?>

<h1>Create SystemLog</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>