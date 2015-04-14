<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */

$this->breadcrumbs=array(
	'System Logs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SystemLog', 'url'=>array('index')),
	array('label'=>'Create SystemLog', 'url'=>array('create')),
	array('label'=>'View SystemLog', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SystemLog', 'url'=>array('admin')),
);
?>

<h1>Update SystemLog <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>