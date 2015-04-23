<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Crear Certificaciones', 'url'=>array('create')),
	array('label'=>'Actualizar Certificaciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Certificaciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres borrar este elemento?')),
	array('label'=>'Administrar Certificaciones', 'url'=>array('admin')),
);
?>

<h1>Ver Certificaciones por Concejos  Médicos </h1>

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
