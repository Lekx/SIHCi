<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Research Areases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>

<h1>Create ResearchAreas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>