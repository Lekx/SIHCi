<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */

$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PressNotes', 'url'=>array('index')),
	array('label'=>'Manage PressNotes', 'url'=>array('admin')),
);
?>

<h1>Create PressNotes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>