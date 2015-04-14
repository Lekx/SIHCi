<?php
/* @var $this FilesManagerController */
/* @var $model FilesManager */

$this->breadcrumbs=array(
	'Files Managers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FilesManager', 'url'=>array('index')),
	array('label'=>'Create FilesManager', 'url'=>array('create')),
	array('label'=>'Update FilesManager', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FilesManager', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FilesManager', 'url'=>array('admin')),
);
?>

<h1>View FilesManager #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'section',
		'file_name',
		//'path',
		'start_date',
		'end_date',
	),
)); ?>
