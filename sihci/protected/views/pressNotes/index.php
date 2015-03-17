<?php
/* @var $this PressNotesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Press Notes',
);

$this->menu=array(
	array('label'=>'Create PressNotes', 'url'=>array('create')),
	array('label'=>'Manage PressNotes', 'url'=>array('admin')),
);
?>

<h1>Press Notes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
