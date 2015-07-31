<?php
/* @var $this PersonsController */
/* @var $model Persons */


$this->menu=array(
	array('label'=>'List Persons', 'url'=>array('index')),
	array('label'=>'Manage Persons', 'url'=>array('admin')),
);
?>

<h1>Datos Personales</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'curriculum'=>$curriculum)); ?>
