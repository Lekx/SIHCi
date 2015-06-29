<?php
/* @var $this SponsorsContactsController */
/* @var $model SponsorsContacts */

$this->breadcrumbs=array(
	'Sponsors Contacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SponsorsContacts', 'url'=>array('index')),
	array('label'=>'Manage SponsorsContacts', 'url'=>array('admin')),
);
?>

<h1>Create SponsorsContacts</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>