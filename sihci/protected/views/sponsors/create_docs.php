<?php
/* @var $this SponsorsDocsController */
/* @var $model SponsorsDocs */

$this->breadcrumbs = array(
	'Sponsors Docs' => array('index'),
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

<h1>Create SponsorsDocs</h1>

<?php $this->renderPartial('_form_docs', array('model' => $model, 'modelDocs' => $modelDocs));?>