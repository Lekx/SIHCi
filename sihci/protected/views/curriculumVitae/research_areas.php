<?php
/* @var $this ResearchAreasController */
/* @var $model ResearchAreas */

$this->breadcrumbs=array(
	'Líneas de Investigación'=>array('research_areas'),
);

$this->menu=array(
	array('label'=>'List ResearchAreas', 'url'=>array('index')),
	array('label'=>'Manage ResearchAreas', 'url'=>array('admin')),
);
?>

<h4>Líneas de Investigación:</h4>

<?php $this->renderPartial('_form_research_areas', array('model'=>$model, 'getResearch'=>$getResearch)); ?>