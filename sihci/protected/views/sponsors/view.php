<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sponsors', 'url'=>array('index')),
	array('label'=>'Create Sponsors', 'url'=>array('create')),
	array('label'=>'Update Sponsors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sponsors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sponsors', 'url'=>array('admin')),
);
?>

<h1>View Sponsors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'id_address',
		'sponsor_name',
		'type',
		'website',
		'sector',
		'class',
		'branch',
		'main_activity',
		'legal_structure',
		'employeess_number',
	),
)); ?>
