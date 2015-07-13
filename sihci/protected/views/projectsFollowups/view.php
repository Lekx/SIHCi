<?php
/* @var $this ProjectsFollowupsController */
/* @var $model ProjectsFollowups */

$this->breadcrumbs=array(
	'Projects Followups'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProjectsFollowups', 'url'=>array('index')),
	array('label'=>'Create ProjectsFollowups', 'url'=>array('create')),
	array('label'=>'Update ProjectsFollowups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProjectsFollowups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProjectsFollowups', 'url'=>array('admin')),
);
?>

<h1>View ProjectsFollowups #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_project',
		'id_user',
		'followup',
		'url_doc',
		'creation_date',
	),
)); ?>
