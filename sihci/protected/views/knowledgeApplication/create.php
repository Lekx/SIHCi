<?php
/* @var $this KnowledgeApplicationController */
/* @var $model KnowledgeApplication */

$this->breadcrumbs=array(
	'Knowledge Applications'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Desplegar', 'url'=>array('index')),
	array('label'=>'Listar', 'url'=>array('admin')),
);
?>

<h1>Crear</h1>


<?php $this->renderPartial('_form', array('model'=>$model)); ?>