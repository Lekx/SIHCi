<?php
/* @var $this DocsIdentityController */
/* @var $model DocsIdentity */

$this->breadcrumbs=array(
	'Docs Identities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DocsIdentity', 'url'=>array('index')),
	array('label'=>'Create DocsIdentity', 'url'=>array('create')),
	array('label'=>'Update DocsIdentity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DocsIdentity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que desea eliminarlo?')),
	array('label'=>'Manage DocsIdentity', 'url'=>array('admin')),
);
?>

<h1>View DocsIdentity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_curriculum',
		'type',
		'description',
		'doc_id',
		'is_Primary',
	),
)); ?>
