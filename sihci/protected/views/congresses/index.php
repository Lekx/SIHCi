<?php
/* @var $this CongressesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Congresses',
);

$this->menu=array(
	array('label'=>'Crear Congreso', 'url'=>array('create')),
	array('label'=>'Administrar Congreso', 'url'=>array('admin')),
);
?>


<h1>Congreso</h1>


<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
