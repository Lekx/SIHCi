<?php
/* @var $this ProjectsFollowupsController */
/* @var $model ProjectsFollowups */



$this->menu=array(
	array('label'=>'List ProjectsFollowups', 'url'=>array('index')),
	array('label'=>'Create ProjectsFollowups', 'url'=>array('create')),
	array('label'=>'View ProjectsFollowups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProjectsFollowups', 'url'=>array('admin')),
);
?>

<h1>Update ProjectsFollowups <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
