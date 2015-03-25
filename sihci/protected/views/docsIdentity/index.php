<?php
/* @var $this DocsIdentityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Docs Identities',
);

$this->menu=array(
	array('label'=>'Create DocsIdentity', 'url'=>array('create')),
	array('label'=>'Manage DocsIdentity', 'url'=>array('admin')),
);
?>

<h1>Documentos Oficiales</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
