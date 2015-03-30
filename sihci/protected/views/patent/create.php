<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Patent', 'url'=>array('index')),
	array('label'=>'Manage Patent', 'url'=>array('admin')),
);
?>

<h1>Crear registro de propiedad intelectual-Patentes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>