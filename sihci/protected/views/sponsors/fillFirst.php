<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */

$controller="";
if(isset($_GET["ide"]) && ((int)$_GET["ide"]) > 0)
			$iduser = (int)$_GET["ide"];
		else
			$iduser = Yii::app()->user->id;

if(is_null(Sponsors::model()->findByAttributes(array("id_user" => $iduser))))
	$controller = "sponsors/fillFirst";

$editUser = "";
if(isset($_GET["ide"]))
	$editUser = "?ide=".(int)$_GET["ide"];

$this->menu = array(
	array('label' => 'Datos Empresa', 'url' => array('sponsors/sponsorsInfo'.$editUser)),
	array('label' => 'Documentos Probatorios', 'url' => array(($controller==""?'sponsors/create_docs':$controller).$editUser)),
	array('label' => 'Datos de Representante', 'url' => array(($controller==""?'sponsors/create_persons':$controller).$editUser)),
	array('label' => 'Datos de Facturacion', 'url' => array(($controller==""?'sponsors/create_billing':$controller).$editUser)),
	array('label' => 'Datos de Contacto', 'url' => array(($controller==""?'sponsors/create_contact':$controller).$editUser)),
	array('label' => 'Datos de Contactos', 'url' => array(($controller==""?'sponsors/create_contacts':$controller).$editUser)),
);
?>

<div class="fillfirst">
      <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
      <h1>Por favor llene primero los datos de empresa</h1>
      <hr>
</div>
