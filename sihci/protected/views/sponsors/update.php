<?php
/* @var $this SponsorsController */
/* @var $model Sponsors */



$this->menu=array(
	array('label'=>'List Sponsors', 'url'=>array('index')),
	array('label'=>'Create Sponsors', 'url'=>array('create')),
	array('label'=>'View Sponsors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sponsors', 'url'=>array('admin')),
);
?>

<h1>Update Sponsors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>