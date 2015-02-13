<?php
/* @var $this DomiciliosController */
/* @var $model Domicilios */

$this->breadcrumbs=array(
	'Domicilioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Domicilios', 'url'=>array('index')),
	array('label'=>'Create Domicilios', 'url'=>array('create')),
	array('label'=>'Update Domicilios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Domicilios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Domicilios', 'url'=>array('admin')),
);
?>

<h1>View Domicilios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_pais',
		'cp',
		'estado',
		'delegacion',
		'municipio',
		'colonia',
		'calle',
		'numero_ext',
		'numero_int',
		'ciudad',
	),
)); ?>
