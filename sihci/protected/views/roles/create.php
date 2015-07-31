<?php
/* @var $this RolesController */
/* @var $model Roles */


$this->menu=array(
	array('label'=>'List Roles', 'url'=>array('index')),
	array('label'=>'Manage Roles', 'url'=>array('admin')),
);
?>

<h1>Create Roles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
