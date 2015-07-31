<?php
/* @var $this PressNotesController */
/* @var $dataProvider CActiveDataProvider */


$this->menu=array(
	array('label'=>'Create PressNotes', 'url'=>array('create')),
	array('label'=>'Manage PressNotes', 'url'=>array('admin')),
);
?>

<h1>Difusión de prensa</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
