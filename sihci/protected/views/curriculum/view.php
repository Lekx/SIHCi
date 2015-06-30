<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Curriculums'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Curriculum', 'url'=>array('index')),
	array('label'=>'Create Curriculum', 'url'=>array('create')),
	array('label'=>'Update Curriculum', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Curriculum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Curriculum', 'url'=>array('admin')),
);
?>

<h1>View Curriculum #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'id_actual_address',
		'native_country',
		'native_language',
		'status',
		'SNI',
		'researcher_title',
	),
)); ?>
