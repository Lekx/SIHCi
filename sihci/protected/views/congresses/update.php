<?php
/* @var $this CongressesController */
/* @var $model Congresses */

$this->breadcrumbs=array(
	'Congresses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Congresses', 'url'=>array('index')),
	array('label'=>'Create Congresses', 'url'=>array('create')),
	array('label'=>'View Congresses', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Congresses', 'url'=>array('admin')),
);
?>

<h1>Update Congresses <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>