<?php
/* @var $this AddressesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Addresses',
);

$this->menu=array(
	array('label'=>'Create Addresses', 'url'=>array('create')),
	array('label'=>'Manage Addresses', 'url'=>array('admin')),
);
?>

<h1>Addresses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
