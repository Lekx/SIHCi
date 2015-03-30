<?php
/* @var $this EmailsController */
/* @var $model Emails */

$this->breadcrumbs=array(
	'Emails'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Emails', 'url'=>array('index')),
	array('label'=>'Create Emails', 'url'=>array('create')),
	array('label'=>'Update Emails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Emails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Emails', 'url'=>array('admin')),
);
?>

<h1>View Emails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_person',
		'email',
		'type',
	),
)); ?>
