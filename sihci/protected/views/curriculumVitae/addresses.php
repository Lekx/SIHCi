<?php
/* @var $this AddressesController */
/* @var $model Addresses */

$this->breadcrumbs=array(
	'Dirección Actual'=>array('addresses'),
);

$this->menu=array(
	array('label'=>'List Addresses', 'url'=>array('index')),
	array('label'=>'Manage Addresses', 'url'=>array('admin')),
);
?>

<h4>Datos de dirección actual:</h4>

<?php $this->renderPartial('_form_addresses', array('model'=>$model)); ?>