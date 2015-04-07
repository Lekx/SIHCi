<?php
/* @var $this PatentController */
/* @var $model Patent */

$this->breadcrumbs=array(
	'Patents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Desplear', 'url'=>array('index')),
	array('label'=>'Listar', 'url'=>array('admin')),
);
?>

<h1>Crear registro de propiedad intelectual-Patentes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>