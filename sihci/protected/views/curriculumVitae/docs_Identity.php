<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */

$this->breadcrumbs=array(
	'Documentos Oficiales'=>array('index'),
);

$this->menu=array(
	array('label'=>'List DocsIdentity', 'url'=>array('index')),
	array('label'=>'Manage DocsIdentity', 'url'=>array('admin')),
);
?>

<h1>Documentos Oficiales</h1>

<?php $this->renderPartial('_form_docs', array('model'=>$model)); ?>