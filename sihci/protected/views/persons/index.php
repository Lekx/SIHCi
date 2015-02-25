<?php
/* @var $this PersonsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Persons',
);

$this->menu=array(
	array('label'=>'Create Persons', 'url'=>array('create')),
	array('label'=>'Manage Persons', 'url'=>array('admin')),
);
?>

<h1>Persons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
