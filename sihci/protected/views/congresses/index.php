<?php
/* @var $this CongressesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Congresses',
);

$this->menu=array(
	array('label'=>'Create Congresses', 'url'=>array('create')),
	array('label'=>'Manage Congresses', 'url'=>array('admin')),
);
?>

<h1>Congresos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
