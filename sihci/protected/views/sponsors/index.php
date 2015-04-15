<?php
/* @var $this SponsorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sponsors',
);

$this->menu=array(
	array('label'=>'Create Sponsors', 'url'=>array('create')),
	array('label'=>'Manage Sponsors', 'url'=>array('admin')),
);
?>

<h1>Sponsors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
