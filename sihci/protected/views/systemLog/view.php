<?php
/* @var $this SystemLogController */
/* @var $model SystemLog */


$this->menu=array(
	array('label'=>'List SystemLog', 'url'=>array('index')),
	array('label'=>'Create SystemLog', 'url'=>array('create')),
	array('label'=>'Update SystemLog', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SystemLog', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SystemLog', 'url'=>array('admin')),
);
?>

<h1>View SystemLog #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'section',
		'details',
		'action',
		'datetime',
	),
)); ?>
