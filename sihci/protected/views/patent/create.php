<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'Desplear', 'url'=>array('index')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Crear registro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>