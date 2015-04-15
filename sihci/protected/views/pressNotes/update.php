<?php
/* @var $this PressNotesController */
/* @var $model PressNotes */

$this->breadcrumbs=array(
	'Press Notes'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List PressNotes', 'url'=>array('index')),
	array('label'=>'Create PressNotes', 'url'=>array('create')),
	array('label'=>'View PressNotes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage PressNotes', 'url'=>array('admin')),
);
?>

<h1>Update PressNotes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>