<?php
/* @var $this GradesController */
/* @var $model Grades */



$this->menu=array(
	array('label'=>'List Grades', 'url'=>array('index')),
	array('label'=>'Create Grades', 'url'=>array('create')),
	array('label'=>'View Grades', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Grades', 'url'=>array('admin')),
);
?>

<h1>Formación Académica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
