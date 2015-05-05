<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */

$this->breadcrumbs=array(
	'Sponsors'=>array('index'),
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

	<div class="cvtitle">
            <img id=""src="<?php echo Yii::app()->request->baseUrl; ?>/img/icons/IconCirculo/DireccionGeneral.png" alt="">
            <h1>Perfil Empresa</h1>
            <hr>
        </div>

<h4>Datos Empresa:</h4>

<?php $this->renderPartial('_form', array('model'=>$model,'modelAddresses'=>$modelAddresses,'modelPersons'=>$modelPersons)); ?>