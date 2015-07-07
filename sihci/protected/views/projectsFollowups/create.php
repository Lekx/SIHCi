<?php
/* @var $this ProjectsFollowupsController */
/* @var $model ProjectsFollowups */

$this->breadcrumbs=array(
	'Projects Followups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProjectsFollowups', 'url'=>array('index')),
	array('label'=>'Manage ProjectsFollowups', 'url'=>array('admin')),
);
?>

<h1>Create ProjectsFollowups</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>