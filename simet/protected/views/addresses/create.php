<?php
/* @var $this AddressesController */
/* @var $model Addresses */

$this->breadcrumbs=array(
	'Addresses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Addresses', 'url'=>array('index')),
	array('label'=>'Manage Addresses', 'url'=>array('admin')),
);
?>

<h1>Create Addresses</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>