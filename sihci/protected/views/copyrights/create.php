<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Desplegar', 'url'=>array('index')),
	array('label'=>'Gestinar', 'url'=>array('admin')),
);
?>

<h1>Crear registro de propiedad intelectual-Derechos de autor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>