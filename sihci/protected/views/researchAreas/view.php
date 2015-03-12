<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Create ResearchAreas', 'url'=>array('create')),
	array('label'=>'Update ResearchAreas', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ResearchAreas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>

<h1>View ResearchAreas #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'name',
	),
)); ?>
