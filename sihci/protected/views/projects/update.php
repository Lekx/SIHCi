<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projects'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);


?>

<h1>Modificación de projecto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>