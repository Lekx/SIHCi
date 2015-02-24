<?php
/* @var $this PruebaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pruebas',
);

$this->menu=array(
	array('label'=>'Create Prueba', 'url'=>array('create')),
	array('label'=>'Manage Prueba', 'url'=>array('admin')),
);
?>

<h1>Pruebas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
