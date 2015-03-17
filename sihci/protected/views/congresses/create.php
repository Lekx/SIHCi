<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Congresses', 'url'=>array('index')),
	array('label'=>'Manage Congresses', 'url'=>array('admin')),
);
?>

<h1>Create Congresses</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>