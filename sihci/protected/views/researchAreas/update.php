<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Create ResearchAreas', 'url'=>array('create')),
	array('label'=>'View ResearchAreas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>

<h1>Líneas de Investigación</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>