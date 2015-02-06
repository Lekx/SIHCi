<?php
/* @var $this ManejadorArchivosController */
/* @var $model ManejadorArchivos */

$this->breadcrumbs=array(
	'Manejador Archivoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ManejadorArchivos', 'url'=>array('index')),
	array('label'=>'Manage ManejadorArchivos', 'url'=>array('admin')),
);
?>

<h1>Create ManejadorArchivos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>