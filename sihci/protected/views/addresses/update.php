<?php
/* @var $this AddressesController */
/* @var $model Addresses */



$this->menu=array(
	array('label'=>'List Addresses', 'url'=>array('index')),
	array('label'=>'Create Addresses', 'url'=>array('create')),
	array('label'=>'View Addresses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Addresses', 'url'=>array('admin')),
);
?>

<h1>Datos de dirección actual</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
