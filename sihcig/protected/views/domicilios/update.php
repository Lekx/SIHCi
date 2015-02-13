<?php
/* @var $this DomiciliosController */
/* @var $model Domicilios */

$this->breadcrumbs=array(
	'Domicilioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Domicilios', 'url'=>array('index')),
	array('label'=>'Create Domicilios', 'url'=>array('create')),
	array('label'=>'View Domicilios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Domicilios', 'url'=>array('admin')),
);
?>

<h1>Update Domicilios <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>