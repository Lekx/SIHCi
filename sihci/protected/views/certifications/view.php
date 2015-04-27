<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	//array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar ', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Certificaciones por Concejos  Médicos </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		//'id_curriculum',
		'folio',
		'reference',
		'reference_type',
		'specialty',
		'validity_date_start',
		'validity_date_end',
		'type',
	),
)); ?>
