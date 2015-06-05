<!-- <?php //echo CHtml::link('Datos Empresa',array('sponsors/sponsorsInfo?ide='.((int)$_GET["ide"]))); ?><br/>
<?php //echo CHtml::link('Documentos Probatorios',array('sponsors/create_docs?ide='.((int)$_GET["ide"]))); ?><br/>
<?php //echo CHtml::link('Datos de Representante',array('sponsors/create_persons?ide='.((int)$_GET["ide"]))); ?><br/>

<?php //echo CHtml::link('Datos de Facturacion',array('sponsors/create_billing?ide='.((int)$_GET["ide"]))); ?><br/>
<?php //echo CHtml::link('Datos de Contacto',array('sponsors/create_contact?ide='.((int)$_GET["ide"]))); ?><br/>
<?php //echo CHtml::link('Datos de Contactos',array('sponsors/create_contacts?ide='.((int)$_GET["ide"]))); ?><br/>
 -->
 <?php
 $controller="";
$this->menu = array(
	array('label' => 'Cuenta', 'url' => array('Account/infoAccount?ide='.((int)$_GET["ide"]))),
	array('label' => 'Datos Empresa', 'url' => array('sponsors/sponsorsInfo?ide='.((int)$_GET["ide"]))),
	array('label' => 'Documentos Probatorios', 'url' => array($controller==""?'sponsors/create_docs?ide='.((int)$_GET["ide"]):$controller)),
	array('label' => 'Datos de Representante', 'url' => array($controller==""?'sponsors/create_persons?ide='.((int)$_GET["ide"]):$controller)),
	array('label' => 'Datos de Facturacion', 'url' => array($controller==""?'sponsors/create_billing?ide='.((int)$_GET["ide"]):$controller)),
	array('label' => 'Datos de Contacto', 'url' => array($controller==""?'sponsors/create_contact?ide='.((int)$_GET["ide"]):$controller)),
	array('label' => 'Datos de Contactos', 'url' => array($controller==""?'sponsors/create_contacts?ide='.((int)$_GET["ide"]):$controller)),
);
?>	
	
	
