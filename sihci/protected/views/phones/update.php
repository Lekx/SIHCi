<?php
/* @var $this PhonesController */
/* @var $model Phones */

$this->breadcrumbs=array(
	'Phones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Phones', 'url'=>array('index')),
	array('label'=>'Create Phones', 'url'=>array('create')),
	array('label'=>'View Phones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Phones', 'url'=>array('admin')),
);
?>

<h1>Datos de Contacto</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'emails' =>$emails)); ?>