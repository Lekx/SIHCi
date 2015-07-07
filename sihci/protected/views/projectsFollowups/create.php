<?php
/* @var $this ProjectsFollowupsController */
/* @var $model ProjectsFollowups */

$this->breadcrumbs=array(
	'Projects Followups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Crear Seguimiento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>