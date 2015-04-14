<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Copyrights', 'url'=>array('index')),
	array('label'=>'Create Copyrights', 'url'=>array('create')),
	array('label'=>'View Copyrights', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Copyrights', 'url'=>array('admin')),
);
?>

<h1>Update Copyrights <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>