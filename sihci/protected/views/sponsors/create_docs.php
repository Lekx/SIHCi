<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */


$controller="";

if(is_null(Sponsors::model()->findByAttributes(array("id_user" => Yii::app()->user->id))))
	$controller = "sponsors/fillFirst";

$editUser = "";
if(isset($_GET["ide"]))
	$editUser = "?ide=".(int)$_GET["ide"];


$this->menu = array(
	array('label' => 'Datos Empresa', 'url' => array('sponsors/sponsorsInfo'.$editUser)),
	array('label' => 'Documentos Probatorios', 'url' => array(($controller==""?'sponsors/create_docs':$controller).$editUser)),
	array('label' => 'Datos de Representante', 'url' => array(($controller==""?'sponsors/create_persons':$controller).$editUser)),
	array('label' => 'Datos de Facturación', 'url' => array(($controller==""?'sponsors/create_billing':$controller).$editUser)),
	array('label' => 'Datos de Contacto', 'url' => array(($controller==""?'sponsors/create_contact':$controller).$editUser)),
	array('label' => 'Datos de Contactos', 'url' => array(($controller==""?'sponsors/create_contacts':$controller).$editUser)),
);
?>

	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Perfil Empresa</h1>
            <hr>
        </div>

<h4>Documentos Probatorios:</h4>
<?php $this->renderPartial('_form_docs', array('model' => $model, 'modelDocs' => $modelDocs));?>
