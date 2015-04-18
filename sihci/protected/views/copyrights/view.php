<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Copyrights', 'url'=>array('index')),
	array('label'=>'Create Copyrights', 'url'=>array('create')),
	array('label'=>'Update Copyrights', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Copyrights', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Copyrights', 'url'=>array('admin')),
);
?>

<h1>View Copyrights #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'participation_type',
		'title',
		'application_date',
		'step_number',
		'resume',
		'beneficiary',
		'entity',
		'impact_value',
		'creation_date',
	),
)); ?>
