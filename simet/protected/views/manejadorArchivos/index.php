<?php
/* @var $this ManejadorArchivosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Manejador Archivoses',
);

$this->menu=array(
	array('label'=>'Create ManejadorArchivos', 'url'=>array('create')),
	array('label'=>'Manage ManejadorArchivos', 'url'=>array('admin')),
);
?>

<h1>Manejador Archivoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
