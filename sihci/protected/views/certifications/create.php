<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Certificaciones por Concejos  Médicos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>