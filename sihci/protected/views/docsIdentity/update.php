<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */

$this->breadcrumbs=array(
	'Docs Identities'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DocsIdentity', 'url'=>array('index')),
	array('label'=>'Create DocsIdentity', 'url'=>array('create')),
	array('label'=>'View DocsIdentity', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DocsIdentity', 'url'=>array('admin')),
);
?>

<h1>Documentos Oficiales</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>