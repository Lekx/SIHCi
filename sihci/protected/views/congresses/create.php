<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Congreso', 'url'=>array('index')),
	array('label'=>'Administrar Congreso', 'url'=>array('admin')),
);
?>

<h1>Participación en Congresos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>