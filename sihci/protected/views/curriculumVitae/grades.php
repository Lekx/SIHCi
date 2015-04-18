<?php
/* @var $this GradesController */
/* @var $model Grades */

$this->breadcrumbs=array(
	'Formación Académica'=>array('grades'),
);

$this->menu=array(
	array('label'=>'List Grades', 'url'=>array('index')),
	array('label'=>'Manage Grades', 'url'=>array('admin')),
);
?>

<h1>Formación Académica</h1>

<?php $this->renderPartial('_form_grades', array('model'=>$model, 'getGrades'=>$getGrades)); ?>