<?php
/* @var $this DomiciliosController */
/* @var $model Domicilios */

$this->breadcrumbs=array(
	'Domicilioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Domicilios', 'url'=>array('index')),
	array('label'=>'Manage Domicilios', 'url'=>array('admin')),
);
?>

<h1>Create Domicilios</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>