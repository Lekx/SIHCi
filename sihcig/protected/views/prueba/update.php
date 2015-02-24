<?php
/* @var $this PruebaController */
/* @var $model Prueba */

$this->breadcrumbs=array(
	'Pruebas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Prueba', 'url'=>array('index')),
	array('label'=>'Create Prueba', 'url'=>array('create')),
	array('label'=>'View Prueba', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Prueba', 'url'=>array('admin')),
);
?>

<h1>Update Prueba <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>