<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs = array(
	'Datos de Facturacion' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Phones', 'url' => array('index')),
	array('label' => 'Manage Phones', 'url' => array('admin')),
);
?>

<h1>Datos de Facturacion</h1>

<?php $this->renderPartial('_form_billing', array('model' => $model, 'modelAddresses' => $modelAddresses, 'sameAd' => $sameAd));?>