<?php
	$controller="";
	$this->menu = array(
		array('label' => 'Cuenta: modificar correo', 'url' => array($controller==""?'Account/updateEmail?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Cuenta: modificar contraseña', 'url' => array($controller==""?'Account/updatePassword?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Datos Empresa', 'url' => array($controller==""?'sponsors/sponsorsInfo?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Documentos Probatorios', 'url' => array($controller==""?'sponsors/create_docs?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Datos de Representante', 'url' => array($controller==""?'sponsors/create_persons?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Datos de Facturacion', 'url' => array($controller==""?'sponsors/create_billing?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Datos de Contacto', 'url' => array($controller==""?'sponsors/create_contact?ide='.((int)$_GET["ide"]):$controller)),
		array('label' => 'Datos de Contactos', 'url' => array($controller==""?'sponsors/create_contacts?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Datos Personales', 'url'=>array($controller==""?'curriculumVitae/personalData?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Documentos oficiales', 'url'=>array($controller==""?'curriculumVitae/docsIdentity?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Datos de dirección actual', 'url'=>array($controller==""?'curriculumVitae/addresses?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Datos laborales', 'url'=>array($controller==""?'curriculumVitae/jobs?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Líneas de investigación', 'url'=>array($controller==""?'curriculumVitae/researchAreas?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Datos de contacto', 'url'=>array($controller==""?'curriculumVitae/phones?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Formación académica', 'url'=>array($controller==""?'curriculumVitae/grades?ide='.((int)$_GET["ide"]):$controller)),
		array('label'=>'Nombramientos', 'url'=>array($controller==""?'curriculumVitae/commission?ide='.((int)$_GET["ide"]):$controller))
	);
?>
