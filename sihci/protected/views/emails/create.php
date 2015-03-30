<?php
/* @var $this EmailsController */
/* @var $model Emails */

$this->breadcrumbs=array(
	'Emails'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Emails', 'url'=>array('index')),
	array('label'=>'Manage Emails', 'url'=>array('admin')),
);
?>

<h1>Create Emails</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>