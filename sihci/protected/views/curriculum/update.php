<?php
/* @var $this CurriculumController */
/* @var $model Curriculum */

$this->breadcrumbs=array(
	'Curriculums'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Curriculum', 'url'=>array('index')),
	array('label'=>'Create Curriculum', 'url'=>array('create')),
	array('label'=>'View Curriculum', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Curriculum', 'url'=>array('admin')),
);
?>

<h1>Update Curriculum <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>