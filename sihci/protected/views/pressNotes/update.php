<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */

$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
	
);
?>

<h1>Modificar registro<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>