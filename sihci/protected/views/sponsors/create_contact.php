<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs = array(
	'Datos de Contacto' => array('index'),
	'Create',
);

$this->menu = array(
	array('label' => 'Datos Empresa', 'url' => array('sponsors/sponsorsInfo')),
	array('label' => 'Documentos Probatorios', 'url' => array('sponsors/create_docs')),
	array('label' => 'Datos de Representante', 'url' => array('sponsors/create_persons')),
	array('label' => 'Datos de Facturacion', 'url' => array('sponsors/create_billing')),
	array('label' => 'Datos de Contacto', 'url' => array('sponsors/create_contact')),
	array('label' => 'Datos de Contactos', 'url' => array('sponsors/create_contacts')),
);
?>

	

<h1>Datos de Contacto</h1>

<?php $this->renderPartial('_form_contact', array('model' => $model,'modelPull' => $modelPull));?>