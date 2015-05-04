<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Gestionar', 'url'=>array('admin')),
	array('label'=>'Crear', 'url'=>array('create')),
);
?>

<h1>Modificar: <?php echo $model->congress; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>