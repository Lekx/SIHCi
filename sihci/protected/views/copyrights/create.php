<?php
/* @var $this CopyrightsController */
/* @var $model Copyrights */

$this->breadcrumbs=array(
	'Copyrights'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Copyrights', 'url'=>array('index')),
	array('label'=>'Manage Copyrights', 'url'=>array('admin')),
);
?>

<h1>Create Copyrights</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>