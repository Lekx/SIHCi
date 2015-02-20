<?php
/* @var $this PersonasController */
/* @var $model Personas */

$this->breadcrumbs=array(
	'Personases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Personas', 'url'=>array('index')),
	array('label'=>'Manage Personas', 'url'=>array('admin')),
);
?>

<h1>Create Personas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>