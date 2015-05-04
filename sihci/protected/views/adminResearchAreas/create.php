<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Gestionar ', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Crear Registro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>