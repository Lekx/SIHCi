<?php
/* @var $this SponsorsContactController */
/* @var $model SponsorsContact */

$this->breadcrumbs=array(
	'Sponsors Contacts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SponsorsContact', 'url'=>array('index')),
	array('label'=>'Create SponsorsContact', 'url'=>array('create')),
	array('label'=>'View SponsorsContact', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SponsorsContact', 'url'=>array('admin')),
);
?>

<h1>Update SponsorsContact <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>