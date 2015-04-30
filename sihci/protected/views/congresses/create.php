<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Listar Congreso', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear ', 'url'=>array('create')),
);
?>

<h1>Crear Registro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>