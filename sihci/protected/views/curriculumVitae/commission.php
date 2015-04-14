<?php
/* @var $this AddressesController */
/* @var $model Addresses */

$this->breadcrumbs=array(
	'Nombramientos'=>array('commission'),
);

$this->menu=array(
	array('label'=>'List Addresses', 'url'=>array('index')),
	array('label'=>'Manage Addresses', 'url'=>array('admin')),
);
?>

<h1>Nombramientos</h1>

<?php $this->renderPartial('_form_commission', array('model'=>$model)); ?>