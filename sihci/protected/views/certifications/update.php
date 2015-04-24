<?php
/* @var $this CertificationsController */
/* @var $model Certifications */

$this->breadcrumbs=array(
	'Certifications'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Certificaciones', 'url'=>array('index')),
	array('label'=>'Crear Certificaciones', 'url'=>array('create')),
	array('label'=>'Ver Certificaciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Certificaciones', 'url'=>array('admin')),
);
?>

<h1>Actualizar Certificaciones por Concejos  Médicos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>