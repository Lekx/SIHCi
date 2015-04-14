<?php
/* @var $this PersonsController */
/* @var $model Persons */

$this->breadcrumbs=array(
	'Datos Personales'=>array('personal_data'),
);

$this->menu=array(
	array('label'=>'List Persons', 'url'=>array('index')),
	array('label'=>'Manage Persons', 'url'=>array('admin')),
);
?>

<h4>Datos Personales</h4>

<?php $this->renderPartial('_form_personal_data', array('model'=>$model, 'curriculum'=>$curriculum)); ?>