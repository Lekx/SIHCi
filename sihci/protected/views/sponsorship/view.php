<?php
/* @var $this SponsorshipController */
/* @var $model Sponsorship */

$this->breadcrumbs=array(
	'Sponsorships'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sponsorship', 'url'=>array('index')),
	array('label'=>'Create Sponsorship', 'url'=>array('create')),
	array('label'=>'Update Sponsorship', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sponsorship', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sponsorship', 'url'=>array('admin')),
);
?>

<h1>View Sponsorship #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user_sponsorer',
		'id_user_researcher',
		'project_name',
		'description',
		'keywords',
		'status',
	),
)); ?>
