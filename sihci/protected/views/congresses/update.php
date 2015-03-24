<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Congreso', 'url'=>array('index')),
	array('label'=>'Crear Congreso', 'url'=>array('create')),
	array('label'=>'Ver Congreso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Congreso', 'url'=>array('admin')),
);
?>

<h1>Actualizar Congreso <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>