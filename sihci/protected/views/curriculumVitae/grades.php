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

<h4>Formación Académica:</h4>


<?php $this->renderPartial('_form_grades', array('model'=>$model, 'getGrades'=>$getGrades)); ?>

