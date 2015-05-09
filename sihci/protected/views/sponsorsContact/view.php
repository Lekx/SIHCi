<?php
/* @var $this SponsorsContactController */
/* @var $model SponsorsContact */

$this->breadcrumbs=array(
	'Sponsors Contacts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SponsorsContact', 'url'=>array('index')),
	array('label'=>'Create SponsorsContact', 'url'=>array('create')),
	array('label'=>'Update SponsorsContact', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SponsorsContact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SponsorsContact', 'url'=>array('admin')),
);
?>

<h1>View SponsorsContact #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_sponsor',
		'type',
		'value',
	),
)); ?>
