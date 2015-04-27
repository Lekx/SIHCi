<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'Listar Congreso', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Modificar ', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estas seguro de borrar este elemento?')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Participación en Congresos</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'id_curriculum',
		'work_title',
		'year',
		'congress',
		'type',
		'country',
		'work_type',
		'keywords',
	),
)); ?>
