<?php
/* @var $this JobsController */
/* @var $model Jobs */

$this->breadcrumbs=array(
	'Datos Laborales'=>array('jobs'),
);

$this->menu=array(
	array('label'=>'List Jobs', 'url'=>array('index')),
	array('label'=>'Manage Jobs', 'url'=>array('admin')),
);
?>

<h1>Datos laborales</h1>

<?php $this->renderPartial('_form_jobs', array('model'=>$model)); ?>