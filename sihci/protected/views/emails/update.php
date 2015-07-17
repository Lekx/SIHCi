<?php
/* @var $this EmailsController */
/* @var $model Emails */

$this->breadcrumbs=array(
	'Emails'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Emails', 'url'=>array('index')),
	array('label'=>'Create Emails', 'url'=>array('create')),
	array('label'=>'View Emails', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Emails', 'url'=>array('admin')),
);
?>

<h1>Update Emails <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>