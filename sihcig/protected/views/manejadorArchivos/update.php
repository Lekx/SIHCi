<?php
/* @var $this ManejadorArchivosController */
/* @var $model ManejadorArchivos */

$this->breadcrumbs=array(
	'Manejador Archivoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ManejadorArchivos', 'url'=>array('index')),
	array('label'=>'Create ManejadorArchivos', 'url'=>array('create')),
	array('label'=>'View ManejadorArchivos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ManejadorArchivos', 'url'=>array('admin')),
);
?>

<h1>Update ManejadorArchivos <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>