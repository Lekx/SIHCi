<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */

$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Crear Difusíon de Prensa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>