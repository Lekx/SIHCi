<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs=array(
	'Datos de Contacto'=>array('phones'),
);

$this->menu=array(
	array('label'=>'List Phones', 'url'=>array('index')),
	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h4>Datos de Contacto:</h4>

<?php $this->renderPartial('_form_phones', array('model'=>$model, 'emails'=>$emails, 'getEmails'=>$getEmails, 'getPhones'=> $getPhones,)); ?>