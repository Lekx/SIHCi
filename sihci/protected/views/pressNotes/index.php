<?php
/* @var $this PressNotesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Press Notes',
);

$this->menu=array(
	array('label'=>'Crear', 'url'=>array('create')),
	array('label'=>'Gestionar', 'url'=>array('admin')),
);
?>

<h1>Difusión de prensa</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
