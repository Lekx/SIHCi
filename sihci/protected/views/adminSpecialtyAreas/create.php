<?php
/* @var $this AdminSpecialtyAreasController */
/* @var $model AdminSpecialtyAreas */

$this->breadcrumbs=array(
	'Admin Specialty Areases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Crear registro</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'modelSpecialtyAreas'=>$modelSpecialtyAreas)); ?>