<?php
/* @var $this PruebaController */
/* @var $model Prueba */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Prueba', 'url'=>array('index')),
	array('label'=>'Create Prueba', 'url'=>array('create')),
	array('label'=>'Update Prueba', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Prueba', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Prueba', 'url'=>array('admin')),
);
?>

<h1>View Prueba #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'sexo',
		'orientacion',
		'estaensusdias',
	),
)); ?>
