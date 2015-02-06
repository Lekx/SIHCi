<?php
/* @var $this ManejadorArchivosController */
/* @var $model ManejadorArchivos */

$this->breadcrumbs=array(
	'Manejador Archivoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ManejadorArchivos', 'url'=>array('index')),
	array('label'=>'Create ManejadorArchivos', 'url'=>array('create')),
	array('label'=>'Update ManejadorArchivos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ManejadorArchivos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ManejadorArchivos', 'url'=>array('admin')),
);
?>

<h1>View ManejadorArchivos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'seccion',
		'nombre_archivo',
		'ruta',
		'fecha_inicio',
		'fecha_fin',
	),
)); ?>
