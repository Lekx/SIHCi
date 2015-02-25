<?php
/* @var $this FilesManagerController */
/* @var $model FilesManager */

$this->breadcrumbs=array(
	'Files Managers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FilesManager', 'url'=>array('index')),
	array('label'=>'Manage FilesManager', 'url'=>array('admin')),
);
?>

<h1>Create FilesManager</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>