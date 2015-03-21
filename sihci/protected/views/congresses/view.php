<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Congresses', 'url'=>array('index')),
	array('label'=>'Create Congresses', 'url'=>array('create')),
	array('label'=>'Update Congresses', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Congresses', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Congresses', 'url'=>array('admin')),
);
?>

<h1>Congreso #<?php echo $model->id; ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'work_title',
		'year',
		'congress',
		'type',
		'country',
		'work_type',
		'keywords',
	),
)); ?>
