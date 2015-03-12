<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Curriculums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Curriculum', 'url'=>array('index')),
	array('label'=>'Manage Curriculum', 'url'=>array('admin')),
);
?>

<h1>Create Curriculum</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>