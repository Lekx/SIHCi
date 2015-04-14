<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Administrar Certificaciones', 'url'=>array('admin')),
);
?>

<h1>Crear Certificaciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>