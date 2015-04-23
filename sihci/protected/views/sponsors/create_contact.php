<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs = array(
	'Datos de Contacto' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'List Phones', 'url' => array('index')),
	array('label' => 'Manage Phones', 'url' => array('admin')),
);
?>

<h1>Datos de Contacto</h1>

<?php $this->renderPartial('_form_contact', array('model' => $model,'modelPull' => $modelPull));?>