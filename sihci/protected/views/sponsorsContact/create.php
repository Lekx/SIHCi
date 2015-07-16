<?php
/* @var $this SponsorsContactController */
/* @var $model SponsorsContact */

$this->breadcrumbs=array(
	'Sponsors Contacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SponsorsContact', 'url'=>array('index')),
	array('label'=>'Manage SponsorsContact', 'url'=>array('admin')),
);
?>

<h1>Create SponsorsContact</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>