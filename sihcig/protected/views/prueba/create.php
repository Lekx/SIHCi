<?php
/* @var $this PruebaController */
/* @var $model Prueba */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Prueba', 'url'=>array('index')),
	array('label'=>'Manage Prueba', 'url'=>array('admin')),
);
?>

<h1>Create Prueba</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>