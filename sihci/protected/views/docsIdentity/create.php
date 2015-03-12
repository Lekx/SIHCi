<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */

$this->breadcrumbs=array(
	'Docs Identities'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DocsIdentity', 'url'=>array('index')),
	array('label'=>'Manage DocsIdentity', 'url'=>array('admin')),
);
?>

<h1>Create DocsIdentity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>