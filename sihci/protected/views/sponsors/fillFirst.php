<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
	'Create',
);

$controller="";

if(is_null(Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))))
	$controller = "sponsors/fillFirst";

$this->menu = array(
	array('label' => 'Datos Empresa', 'url' => array('sponsors/sponsorsInfo')),
	array('label' => 'Documentos Probatorios', 'url' => array($controller==""?'sponsors/create_docs':$controller)),
	array('label' => 'Datos de Representante', 'url' => array($controller==""?'sponsors/create_persons':$controller)),
	array('label' => 'Datos de Facturacion', 'url' => array($controller==""?'sponsors/create_billing':$controller)),
	array('label' => 'Datos de Contacto', 'url' => array($controller==""?'sponsors/create_contact':$controller)),
	array('label' => 'Datos de Contactos', 'url' => array($controller==""?'sponsors/create_contacts':$controller)),
);
?>

<div class="fillfirst">
      <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
      <h1>Por favor llene primero los datos de cuenta</h1>
      <hr>
</div>
